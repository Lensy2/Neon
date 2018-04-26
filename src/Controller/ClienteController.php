<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Forms\Type\FormTypeCliente;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClienteController extends Controller
{
    var $strDqlLista = "";
    var $strCodigo = "";
    var $strNombre = "";
    var $strIdentificacion = "";

    /**
     * @Route("/cliente/lista", name="lista_cliente")
     */
    public function listaAction(Request $request) {
        $page=$request->query->get('page', 1);
        $maxPerPage = '2';
        $currentPage = $page;
        if (!$page){$currentPage = '1';}
        $entityManager = $this->getDoctrine()->getManager();
        $queryBuilder = $entityManager->createQueryBuilder()
            ->select(array('c'))
            ->from('App\Entity\Cliente', 'c');
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($maxPerPage)->setCurrentPage($currentPage);
        return $this->render('cliente/listaCliente.html.twig',array('pager' => $pagerfanta));

    }
    /**
     * @Route("/cliente/crear_cliente", name="crear_cliente")
     */
    public function nuevoAction(Request $request, $codigoCliente = '') {
        $em = $this->getDoctrine()->getManager();
        $arCliente= new Cliente();
        if ($codigoCliente != '' && $codigoCliente != '0') {
            $arCliente = $em->getRepository('Cliente')->find($codigoCliente);
            $arCliente = new Cliente();
        }
        $form = $this->createForm(\App\Forms\Type\FormTypeCliente::class, $arCliente);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arCliente = $form->getData();
                $arClienteValidar = new \Cliente();
                $arClienteValidar = $em->getRepository('ClienteRepository')->findBy(array('nit' => $arCliente->getNit()));
                if (($codigoCliente == 0 || $codigoCliente == '') && count($arClienteValidar) > 0) {
                } else {
                    $arUsuario = $this->getUser();
                    $arCliente->setUsuario($arUsuario->getUserName());
                    $em->persist($arCliente);
                    $em->flush();
                    if ($form->get('guardarnuevo')->isClicked()) {
                        return $this->redirect($this->generateUrl('lista_cliente', array('codigoCliente' => 0)));
                    } else {
                        return $this->redirect($this->generateUrl('lista_cliente'));
                    }
                }
            }
        }
        return $this->render('cliente/crearCliente.html.twig', array(
            'arCliente' => $arCliente,
            'form' => $form->createView()));
    }
    private function lista() {
        $em = $this->getDoctrine()->getManager();
        $this->strDqlLista = $em->getRepository('ClienteRepository')->listaDQL(
            $this->strNombre, $this->strCodigo, $this->strIdentificacion
        );
    }

    private function filtrar($form) {
        $this->strCodigo = $form->get('TxtCodigo')->getData();
        $this->strNombre = $form->get('TxtNombre')->getData();
        $this->strIdentificacion = $form->get('TxtIdentificacion')->getData();
        $this->lista();
    }

    private function formularioFiltro() {
        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $this->strNombre))
            ->add('TxtIdentificacion', TextType::class, array('label' => 'Identificacion', 'data' => $this->strIdentificacion))
            ->add('TxtCodigo', TextType::class, array('label' => 'Codigo', 'data' => $this->strCodigo))
            ->add('BtnEliminar', SubmitType::class, array('label' => 'Eliminar',))
            ->add('BtnExcel', SubmitType::class, array('label' => 'Excel',))
            ->add('BtnFiltrar', SubmitType::class, array('label' => 'Filtrar'))
            ->getForm();
        return $form;
    }

    private function generarExcel() {
        ob_clean();
        $em = $this->getDoctrine()->getManager();
        $session = new session;
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("EMPRESA")
            ->setLastModifiedBy("EMPRESA")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle('1')->getFont()->setBold(true);
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'CÓDIG0')
            ->setCellValue('B1', 'NIT')
            ->setCellValue('C1', 'DV')
            ->setCellValue('D1', 'NOMBRE')
            ->setCellValue('E1', 'CIUDAD')
            ->setCellValue('F1', 'DIRECCION')
            ->setCellValue('G1', 'TELEFONO')
            ->setCellValue('H1', 'CELULAR')
            ->setCellValue('I1', 'EMAIL');
        $i = 2;

        $query = $em->createQuery($this->strDqlLista);
        $arClientes = new \Cliente();
        $arClientes = $query->getResult();

        foreach ($arClientes as $arCliente) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $arCliente->getCodigoClientePk())
                ->setCellValue('B' . $i, $arCliente->getNit())
                ->setCellValue('C' . $i, $arCliente->getDigitoVerificacion())
                ->setCellValue('D' . $i, $arCliente->getNombreCorto())
                ->setCellValue('E' . $i, $arCliente->getCiudadRel()->getNombre())
                ->setCellValue('F' . $i, $arCliente->getDireccion())
                ->setCellValue('G' . $i, $arCliente->getTelefono())
                ->setCellValue('H' . $i, $arCliente->getCelular())
                ->setCellValue('I' . $i, $arCliente->getEmail());
            $i++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Cliente');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Clientes.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('php://output');
        exit;
    }

}









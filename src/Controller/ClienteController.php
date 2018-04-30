<?php

namespace App\Controller;
use App\Repository;
use App\Entity\Cliente;
use App\Forms\Type\FormTypeCliente;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Session\Session;
use Pagerfanta\Adapter\DoctrineSelectableAdapter;
use Doctrine\Common\Collections\Criteria;

class ClienteController extends Controller
{
    var $strCodigo = "";
    var $strNombre = "";
    var $strIdentificacion = "";

    /**
     * @Route("/cliente/lista", name="lista_cliente")
     */
    public function listaAction(Request $request) {
        $sesion = new Session();
        $page=$request->query->get('page', 1);
        $maxPerPage = '50';
        $currentPage = $page;
        if (!$page){$currentPage = '1';}

        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $sesion->get('filtroNombreCliente'), 'required'=>false))
            ->add('BtnFiltrar', SubmitType::class, array('label' => 'Filtrar'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if ($form->get('BtnFiltrar')->isClicked()) {
                $this->filtrar($form);
                $currentPage = 1;
            }
        }
        $dqlLista = $this->lista();
        $adapter = new DoctrineORMAdapter($dqlLista);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($maxPerPage)->setCurrentPage($currentPage);
        return $this->render('cliente/listaCliente.html.twig',array('pager' => $pagerfanta, 'form'=>$form->createView()));

    }
    /**
     * @Route("/cliente/crear_cliente", name="crear_cliente")
     */
    public function nuevoAction(Request $request, $codigoCliente = '') {
        $em = $this->getDoctrine()->getManager();
        $arCliente= new Cliente();
        if ($codigoCliente != '' && $codigoCliente != '0') {
            $arCliente = new Cliente();
            $arCliente = $em->getRepository('Cliente')->find($codigoCliente);

        }
        $form = $this->createForm(\App\Forms\Type\FormTypeCliente::class, $arCliente);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $arCliente = new Cliente();
                $arCliente = $form->getData();
                $arEmpresa = $em->getRepository('App:Empresa')->find(1);
                $arCliente->setEmpresaRel($arEmpresa);
                  if ($form->get('btnGuardar')->isClicked()) {
                          $em->persist($arCliente);
                          $em->flush();
                      return $this->redirect($this->generateUrl('lista_cliente', array('codigoCliente' => 0)));
                    } else {
                        return $this->redirect($this->generateUrl('lista_cliente'));
                    }
                }
            }
        return $this->render('cliente/crearCliente.html.twig', array(
            'arCliente' => $arCliente,
            'form' => $form->createView()));
    }
    private function lista() {
        $sesion = new Session();
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('App:Cliente')->listaDQL(
            $sesion->get("filtroNombreCliente")
        );
    }

    private function filtrar($form) {
        $sesion = new Session();
        $sesion->set("filtroNombreCliente", $form->get('TxtNombre')->getData());
    }

    private function formularioFiltro() {
        $session= new Session();
        $form = $this->createFormBuilder()
            ->add('TxtNombre', TextType::class, array('label' => 'Nombre', 'data' => $session->get('filtrarNombre')))
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









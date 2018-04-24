<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_empresa_pk", type="integer")
     */
    private $codigoEmpresaPk;

    /**
     * @ORM\Column(type="string", nullable=false, name="nit")
     */
    private $nit;

    /**
     * @ORM\Column(type="string", nullable=false, name="nombre")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono")
     */
    private $telefono;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="empresaRel")
     */
    private $usuarioEmpresaRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cliente", mappedBy="empresaRel")
     */
    private $clienteEmpresaRel;

    /**
     * @return mixed
     */
    public function getCodigoEmpresaPk()
    {
        return $this->codigoEmpresaPk;
    }

    /**
     * @return mixed
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * @param mixed $nit
     */
    public function setNit($nit)
    {
        $this->nit = $nit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioEmpresaRel()
    {
        return $this->usuarioEmpresaRel;
    }

    /**
     * @param mixed $usuarioEmpresaRel
     */
    public function setUsuarioEmpresaRel($usuarioEmpresaRel)
    {
        $this->usuarioEmpresaRel = $usuarioEmpresaRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClienteEmpresaRel()
    {
        return $this->clienteEmpresaRel;
    }

    /**
     * @param mixed $clienteEmpresaRel
     */
    public function setClienteEmpresaRel($clienteEmpresaRel)
    {
        $this->clienteEmpresaRel = $clienteEmpresaRel;
        return $this;
    }


}

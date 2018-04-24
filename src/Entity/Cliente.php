<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_cliente_pk", type="integer", unique=true)
     */
    private $codigoClientePk;

    /**
     * @ORM\Column(type="string", nullable=false, name="identificacion")
     */
    private $identificacion;

    /**
     * @ORM\Column(type="string", nullable=false, name="nombre")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono")
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", nullable=true, name="email")
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=false, name="codigo_empresa_fk")
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="clienteEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    private $empresaRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sede", mappedBy="clienteRel")
     */
    private $sedeClienteRel;

    /**
     * @return mixed
     */
    public function getCodigoClientePk()
    {
        return $this->codigoClientePk;
    }

    /**
     * @return mixed
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed $identificacion
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoEmpresaFk()
    {
        return $this->codigoEmpresaFk;
    }

    /**
     * @param mixed $codigoEmpresaFk
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk)
    {
        $this->codigoEmpresaFk = $codigoEmpresaFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmpresaRel()
    {
        return $this->empresaRel;
    }

    /**
     * @param mixed $empresaRel
     */
    public function setEmpresaRel($empresaRel)
    {
        $this->empresaRel = $empresaRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSedeClienteRel()
    {
        return $this->sedeClienteRel;
    }

    /**
     * @param mixed $sedeClienteRel
     */
    public function setSedeClienteRel($sedeClienteRel)
    {
        $this->sedeClienteRel = $sedeClienteRel;
        return $this;
    }


}



<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SedeRepository")
 */
class Sede
{

    /**
     * @ORM\Column(name="codigo_sede_pk",type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $codigoSedePk;

    /**
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @ORM\Column(name="direccion", type="string", length=150, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(name="telefono", type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(name="codigo_cliente_fk", type="integer", nullable=false)
     */
    private $codigoClienteFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="sedeClienteRel")
     * @ORM\JoinColumn(name="codigo_cliente_fk", referencedColumnName="codigo_cliente_pk")
     */
    private $clienteRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Punto", mappedBy="sedePuntoRel")
     */
    private $puntoSedeRel;

    /**
     * @return mixed
     */
    public function getCodigoSedePk()
    {
        return $this->codigoSedePk;
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
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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
    public function getCodigoClienteFk()
    {
        return $this->codigoClienteFk;
    }

    /**
     * @param mixed $codigoClienteFk
     */
    public function setCodigoClienteFk($codigoClienteFk)
    {
        $this->codigoClienteFk = $codigoClienteFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClienteRel()
    {
        return $this->clienteRel;
    }

    /**
     * @param mixed $clienteRel
     */
    public function setClienteRel($clienteRel)
    {
        $this->clienteRel = $clienteRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPuntoSedeRel()
    {
        return $this->puntoSedeRel;
    }

    /**
     * @param mixed $puntoSedeRel
     */
    public function setPuntoSedeRel($puntoSedeRel)
    {
        $this->puntoSedeRel = $puntoSedeRel;
        return $this;
    }



}
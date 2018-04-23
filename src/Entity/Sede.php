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
     * @ORM\Column(type="string", nullable=true, name="identificacion")
     */

    private $identificacion;

    /**
     * @ORM\Column(type="string", nullable=true, name="nombre")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", nullable=true, name="direccion")
     */

    private $direccion;

    /**
     * @ORM\Column(name="telefono", type="integer", nullable=true)
     */

    private $telefono;

    /**
     * @return mixed
     */
    public function getCodigoSedePk()
    {
        return $this->codigoSedePk;
    }

    /**
     * @param mixed $codigoSedePk
     */
    public function setCodigoSedePk($codigoSedePk)
    {
        $this->codigoSedePk = $codigoSedePk;
        return $this;
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






}
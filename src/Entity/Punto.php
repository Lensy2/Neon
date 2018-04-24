<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PuntoRepository")
 */
class Punto
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_punto_pk", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoPuntoPk;

    /**
     * @ORM\Column(type="string", nullable=false, name="nombre", length=100)
     */
    private $nombre;
    /**
     * @ORM\Column(type="string", nullable=true, name="direccion", length=100)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono", length=15)
     */
    private $telefono;

    /**
     * @ORM\Column(type="integer", nullable=false, name="codigo_sede_fk")
     */
    private $codigoSedeFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sede", inversedBy="puntoSedeRel")
     * @ORM\JoinColumn(name="codigo_sede_fk", referencedColumnName="codigo_sede_pk")
     */
    private $sedeRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actividad", mappedBy="actividadRel")
     */
    private $actividadPuntoRel;

    /**
     * @return mixed
     */
    public function getCodigoPuntoPk()
    {
        return $this->codigoPuntoPk;
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
    public function getCodigoSedeFk()
    {
        return $this->codigoSedeFk;
    }

    /**
     * @param mixed $codigoSedeFk
     */
    public function setCodigoSedeFk($codigoSedeFk)
    {
        $this->codigoSedeFk = $codigoSedeFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSedeRel()
    {
        return $this->sedeRel;
    }

    /**
     * @param mixed $sedeRel
     */
    public function setSedeRel($sedeRel)
    {
        $this->sedeRel = $sedeRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActividadPuntoRel()
    {
        return $this->actividadPuntoRel;
    }

    /**
     * @param mixed $actividadPuntoRel
     */
    public function setActividadPuntoRel($actividadPuntoRel)
    {
        $this->actividadPuntoRel = $actividadPuntoRel;
        return $this;
    }


}

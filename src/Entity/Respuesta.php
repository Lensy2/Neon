<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RespuestasRepository")
 */
class Respuesta
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_respuestas_pk", type="integer", unique=true)
     */
    private $codigoRespuestasPk;

    /**
     * @ORM\Column(type="date", nullable=false, name="fecha_creacion",)
     */

    private $fechaCreacion;

    /**
     * @ORM\Column(type="date", nullable=true, name="actualizado_en")
     */
    private $actualizadoEn;

    /**
     * @ORM\Column(type="string", nullable=true, name="direccion", length=100)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono", length=15)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", nullable=true, name="email", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true, name="nombre_contacto", length=100)
     */
    private $nombre_contacto;

    /**
     * @ORM\Column(type="string", nullable=true, name="descripcion", length=100)
     */

    private $descripcion;


    /**
     * @ORM\Column(type="integer", nullable=false, name="codigo_formulario_fk")
     */
    private $codigoFormularioFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formulario", inversedBy="respuestaFormularioRel")
     * @ORM\JoinColumn(name="codigo_formulario_fk", referencedColumnName="codigo_formulario_pk")
     */
    private $FormularioRel;

    /**
     * @return int
     */
    public function getCodigoRespuestasPk(): int
    {
        return $this->codigoRespuestasPk;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActualizadoEn()
    {
        return $this->actualizadoEn;
    }

    /**
     * @param mixed $actualizadoEn
     */
    public function setActualizadoEn($actualizadoEn)
    {
        $this->actualizadoEn = $actualizadoEn;
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
    public function getNombreContacto()
    {
        return $this->nombre_contacto;
    }

    /**
     * @param mixed $nombre_contacto
     */
    public function setNombreContacto($nombre_contacto)
    {
        $this->nombre_contacto = $nombre_contacto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoFormularioFk()
    {
        return $this->codigoFormularioFk;
    }

    /**
     * @param mixed $codigoFormularioFk
     */
    public function setCodigoFormularioFk($codigoFormularioFk)
    {
        $this->codigoFormularioFk = $codigoFormularioFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormularioRel()
    {
        return $this->FormularioRel;
    }

    /**
     * @param mixed $FormularioRel
     */
    public function setFormularioRel($FormularioRel)
    {
        $this->FormularioRel = $FormularioRel;
        return $this;
    }



}

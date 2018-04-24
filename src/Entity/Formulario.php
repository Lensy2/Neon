<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormularioRepository")
 */
class Formulario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_formulario_pk", type="integer", unique=true)
     */
    private $codigoFormularioPk;

    /**
     * @ORM\Column(type="date", nullable=false, name="fecha_creacion")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="date", nullable=true, name="actualizado_en")
     */
    private $actualizadoEn;

    /**
     * @ORM\Column(type="string", nullable=true, name="creado_por")
     */
    private $creadoPor;

    /**
     * @ORM\Column(type="string", nullable=true, name="email", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true, name="nombre_contacto", length=100)
     */
    private $nombre_contacto;

    /**
     * @ORM\Column(type="string", nullable=true, name="descripcion", length=200)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", nullable=true, name="novedad", length=500)
     */
    private $novedad;

    /**
     * @ORM\Column(name="estado_activo", columnDefinition="TINYINT DEFAULT 1 NOT NULL")
     */
    private $estadoActivo;

    /**
     * @ORM\Column(type="string", nullable=true, name="direccion", length=100)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono", length=15)
     */
    private $telefono;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SegmentoFormulario", mappedBy="formularioRel")
     */
    private $segmentoFormularioFormularioRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Respuesta", mappedBy="respuestaRel")
     */
    private $respuestaFormularioRel;

    /**
     * @return mixed
     */
    public function getCodigoFormularioPk()
    {
        return $this->codigoFormularioPk;
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
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }

    /**
     * @param mixed $creadoPor
     */
    public function setCreadoPor($creadoPor)
    {
        $this->creadoPor = $creadoPor;
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
    public function getNovedad()
    {
        return $this->novedad;
    }

    /**
     * @param mixed $novedad
     */
    public function setNovedad($novedad)
    {
        $this->novedad = $novedad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadoActivo()
    {
        return $this->estadoActivo;
    }

    /**
     * @param mixed $estadoActivo
     */
    public function setEstadoActivo($estadoActivo)
    {
        $this->estadoActivo = $estadoActivo;
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
    public function getSegmentoFormularioFormularioRel()
    {
        return $this->segmentoFormularioFormularioRel;
    }

    /**
     * @param mixed $segmentoFormularioFormularioRel
     */
    public function setSegmentoFormularioFormularioRel($segmentoFormularioFormularioRel)
    {
        $this->segmentoFormularioFormularioRel = $segmentoFormularioFormularioRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRespuestaFormularioRel()
    {
        return $this->respuestaFormularioRel;
    }

    /**
     * @param mixed $respuestaFormularioRel
     */
    public function setRespuestaFormularioRel($respuestaFormularioRel)
    {
        $this->respuestaFormularioRel = $respuestaFormularioRel;
        return $this;
    }


}

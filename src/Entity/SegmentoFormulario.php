<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SegmentoFormularioRepository")
 */
class SegmentoFormulario
{
    /**
     * @ORM\Column(name="codigo_segmento_formulario_pk",type="integer", unique=true)
     *  @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $codigoSegmentoFormularioPk;

    /**
     * @ORM\Column(type="string", nullable=true, name="nombre", nullable=false)
     */
    private $nombre;
    
    /**
     * @ORM\Column(name="codigo_formulario_fk", type="integer", nullable=false)
     */
    private $codigoFormularioFk;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CampoFormulario", mappedBy="segmentoFormularioRel")
     */
    private $campoFormularioSegmentoFormularioRel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formulario", inversedBy="segmentoFormularioFormulario")
     * @ORM\JoinColumn(name="codigo_formulario_fk", referencedColumnName="codigo_formulario_pk")
     */
    private $formularioRel;

    /**
     * @return mixed
     */
    public function getCodigoSegmentoFormularioPk()
    {
        return $this->codigoSegmentoFormularioPk;
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
    public function getCampoFormularioSegmentoFormularioRel()
    {
        return $this->campoFormularioSegmentoFormularioRel;
    }

    /**
     * @param mixed $campoFormularioSegmentoFormularioRel
     */
    public function setCampoFormularioSegmentoFormularioRel($campoFormularioSegmentoFormularioRel)
    {
        $this->campoFormularioSegmentoFormularioRel = $campoFormularioSegmentoFormularioRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormularioRel()
    {
        return $this->formularioRel;
    }

    /**
     * @param mixed $formularioRel
     */
    public function setFormularioRel($formularioRel)
    {
        $this->formularioRel = $formularioRel;
        return $this;
    }


}

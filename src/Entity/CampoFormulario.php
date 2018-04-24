<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampoFormularioRepository")
 */
class CampoFormulario
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_formulario_pk", type="integer", unique=true)
     */
    private $codigoFormularioPk;

    /**
     * @ORM\Column(name="codigo_campo_fk", type="integer", nullable=false)
     */
    private $codigoCampoFk;

    /**
     * @ORM\Column(name="codigo_segmento_formulario_fk", type="integer", nullable=false)
     */
    private $codigoSegmentoFormularioFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campo", inversedBy="campoFormularioCampoRel")
     * @ORM\JoinColumn(name="codigo_campo_fk", referencedColumnName="codigo_campo_pk")
     */
    private $campoRel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SegmentoFormulario", inversedBy="campoFormularioSegmentoFormularioRel")
     * @ORM\JoinColumn(name="codigo_segmento_formulario_fk", referencedColumnName="codigo_segmento_formulario_pk")
     */
    private $segmentoFormularioRel;

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
    public function getCodigoCampoFk()
    {
        return $this->codigoCampoFk;
    }

    /**
     * @param mixed $codigoCampoFk
     */
    public function setCodigoCampoFk($codigoCampoFk)
    {
        $this->codigoCampoFk = $codigoCampoFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoSegmentoFormularioFk()
    {
        return $this->codigoSegmentoFormularioFk;
    }

    /**
     * @param mixed $codigoSegmentoFormularioFk
     */
    public function setCodigoSegmentoFormularioFk($codigoSegmentoFormularioFk)
    {
        $this->codigoSegmentoFormularioFk = $codigoSegmentoFormularioFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCampoRel()
    {
        return $this->campoRel;
    }

    /**
     * @param mixed $campoRel
     */
    public function setCampoRel($campoRel)
    {
        $this->campoRel = $campoRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSegmentoFormularioRel()
    {
        return $this->segmentoFormularioRel;
    }

    /**
     * @param mixed $segmentoFormularioRel
     */
    public function setSegmentoFormularioRel($segmentoFormularioRel)
    {
        $this->segmentoFormularioRel = $segmentoFormularioRel;
        return $this;
    }





}
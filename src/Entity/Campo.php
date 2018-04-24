<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampoRepository")
 */
class Campo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_campo_pk", type="integer", unique=true)
     */
    private $codigoCampoPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(name="tipo", type="string", length=25)
     */

    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OpcionCampo", mappedBy="campoRel")
     */
    private $opcionCampoCampoRel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CampoFormulario", mappedBy="campoRel")
     */
    private $campoFormularioCampoRel;

    /**
     * @return mixed
     */
    public function getCodigoCampoPk()
    {
        return $this->codigoCampoPk;
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOpcionCampoCampoRel()
    {
        return $this->opcionCampoCampoRel;
    }

    /**
     * @param mixed $opcionCampoCampoRel
     */
    public function setOpcionCampoCampoRel($opcionCampoCampoRel)
    {
        $this->opcionCampoCampoRel = $opcionCampoCampoRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCampoFormularioCampoRel()
    {
        return $this->campoFormularioCampoRel;
    }

    /**
     * @param mixed $campoFormularioCampo
     */
    public function setCampoFormularioCampoRel($campoFormularioCampoRel)
    {
        $this->campoFormularioCampoRel = $campoFormularioCampoRel;
        return $this;
    }


}

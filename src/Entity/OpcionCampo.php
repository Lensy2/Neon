<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpcionCampoRepository")
 */
class OpcionCampo
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_opcion_campo_pk", type="integer", unique=true)
     */
    private $codigoOpcionCampoPk;

    /**
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     *
     * @ORM\Column(name="valor", type="string", length=255)
     */

    private $valor;

    /**
     *
     * @ORM\Column(name="codigo_campo_fk", type="integer",nullable=false)
     */
    private $codigoCampoFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campo", inversedBy="opcionCampoCampoRel")
     * @ORM\JoinColumn(name="codigo_campo_fk", referencedColumnName="codigo_campo_pk")
     */
    private $campoRel;

    /**
     * @return mixed
     */
    public function getCodigoOpcionCampoPk()
    {
        return $this->codigoOpcionCampoPk;
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
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





}

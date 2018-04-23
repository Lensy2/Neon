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
     * @ORM\Column(name="codigo_rol_pk", type="integer", unique=true)
     */
    private $codigoRespuestasPk;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codigoRespuestasPk = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add usuarioRolRel
     *
     * @param \App\Entity\codigoRespuestas $codigoRespuestas
     *
     * @return codigoRespuestasPk
     */
    public function codigoRespuestas(\App\Entity\Usuario $codigoRespuestas)
    {
        $this->codigoRespuestasPk[] = $codigoRespuestas;

        return $this;
    }

    /**
     * Remove codigoRespuestasPk
     *
     * @param \App\Entity\Usuario $codigoRespuestas
     */
    public function codigoRespuestaspk(\App\Entity\Usuario $codigoRespuestas)
    {
        $this->codigoRespuestasPk->removeElement($codigoRespuestas);
    }

    /**
     * Get usuarioRolRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodigoRespuestaspk()
    {
        return $this->codigoRespuestasPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Rol
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}

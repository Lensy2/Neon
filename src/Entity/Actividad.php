<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActividadRepository")
 */
class Actividad
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_rol_pk", type="integer", unique=true)
     */
    private $codigoActividadPk;

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
        $this->codigoActividad= new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add usuarioRolRel
     *
     * @param \App\Entity\Usuario $usuarioRolRel
     *
     * @return codigoActividad
     */
    public function codigoActividad(\App\Entity\Usuario $codigoActividad)
    {
        $this->codigoActividad[] = $codigoActividad;

        return $this;
    }

    /**
     * Remove usuarioRolRel
     *
     * @param \App\Entity\Usuario $codigoActividad
     */
    public function removecodigoActividad(\App\Entity\Usuario $codigoActividad)
    {
        $this->codigoActividad->removeElement($codigoActividad);
    }

    /**
     * Get usuarioRolRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuariocodigoActividad()
    {
        return $this->codigoActividad;
    }

    /**
     * Get codigoRolPk
     *
     * @return integer
     */
    public function getcodigoActividadPk()
    {
        return $this->codigoActividadPk;
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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolRepository")
 */
class Rol
{


    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_rol_pk", type="integer", unique=true)
     */
    private $codigoRolPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="rolRel")
     */
    private $usuarioRolRel;

    /**
     * @return mixed
     */
    public function getCodigoRolPk()
    {
        return $this->codigoRolPk;
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
    public function getUsuarioRolRel()
    {
        return $this->usuarioRolRel;
    }

    /**
     * @param mixed $usuarioRolRel
     */
    public function setUsuarioRolRel($usuarioRolRel)
    {
        $this->usuarioRolRel = $usuarioRolRel;
        return $this;
    }



}

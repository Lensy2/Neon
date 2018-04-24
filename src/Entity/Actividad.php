<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActividadRepository")
 */
class Actividad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="codigo_actividad_pk", type="integer", unique=true)
     */
    private $codigoActividadPk;

    /**
     * @ORM\Column(type="date", nullable=false, name="fecha_creacion")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="string", nullable=true, name="actualizado_en",length=100)
     */
    private $actualizadoEn;

    /**
     * @ORM\Column(type="string", nullable=true, name="creado_por",length=100)
     */
    private $creadoPor;

    /**
     * @ORM\Column(type="string", nullable=true, name="actualizado_por",length=100)
     */
    private $actualizadoPor;

    /**
     * @ORM\Column(name="estado", columnDefinition="TINYINT DEFAULT 1 NOT NULL")
     */
    private $estado;

    /**
     * @ORM\Column(type="time", nullable=false, name="hora")
     */
    private $hora;

    /**
     * @ORM\Column(type="integer", nullable=false, name="codigo_punto_fk")
     */
    private $codigoPuntoFk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Punto", inversedBy="actividadPuntoRel")
     * @ORM\JoinColumn(name="codigo_punto_fk", referencedColumnName="codigo_punto_pk")
     */
    private $puntoRel;
}

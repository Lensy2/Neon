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
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombre;
    
    /**
     * @ORM\Column(name="codigo_cliente_fk", type="integer", nullable=true)
     */
    private $codigoFormularioFk;


    /**
     * Set codigoUsuarioPk
     *
     * @param string $SegmentoFormulario
     *
     * @return Usuario
     */
    public function setCodigoUsuarioPk($SegmentoFormulario)
    {
        $this->SegmentoFormulario = $SegmentoFormulario;

        return $this;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Usuario
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

}

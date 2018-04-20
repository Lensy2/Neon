<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="codigo_empresa_pk", type="integer")
     */
    private $codigoEmpresaPk;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCodigoEmpresaPk()
    {
        return $this->codigoEmpresaPk;
    }

    /**
     * @param mixed $codigoEmpresaPk
     * @return Empresa
     */
    public function setCodigoEmpresaPk($codigoEmpresaPk)
    {
        $this->codigoEmpresaPk = $codigoEmpresaPk;
        return $this;
    }

}

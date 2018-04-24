<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\Role;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario implements UserInterface, \Serializable
{

    /**
     * @ORM\Column(type="string", nullable=false, name="username")
     */
    private $username;

    /**
     * @ORM\Column(name="codigo_usuario_pk",type="integer")
     *  @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $codigoUsuarioPk;

    /**
     * @ORM\Column(type="string", nullable=false, name="identificacion")
     */
    private $identificacion;

    /**
     * @ORM\Column(type="string", nullable=true, name="apellidos")
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", nullable=true,name="nombre")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", nullable=true, name="email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true, name="clave")
     */
    private $clave;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="verificado")
     */
    private $verificado;

    /**
     * @ORM\Column(type="string", nullable=true, name="token")
     */
    private $token;

    /**
     * @ORM\Column(type="string", nullable=true, name="telefono")
     */
    private $telefono;

    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer", nullable=false)
     */
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(type="integer", nullable=false, name="codigo_rol_fk")
     */
    private $codigoRolFk;

    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Rol", inversedBy="usuarioRolRel")
    * @ORM\JoinColumn(name="codigo_rol_fk", referencedColumnName="codigo_rol_pk")
    */
    private $rolRel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="usuarioEmpresaRel")
     * @ORM\JoinColumn(name="codigo_empresa_fk", referencedColumnName="codigo_empresa_pk")
     */
    private $empresaRel;


    public function serialize()
    {
        return serialize(array(
            $this->codigoUsuarioPk,
            $this->identificacion,
            $this->clave
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->codigoUsuarioPk,
            $this->identificacion,
            $this->clave

            ) = unserialize($serialized);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getRoles()
    {

        return array('ROLE_USER');
    }

    public function getPassword()
    {
        return $this->getClave();
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    /**
     * Get codigoUsuarioPk
     *
     * @return string
     */
    public function getCodigoUsuarioPk()
    {
        return $this->codigoUsuarioPk;
    }

    /**
     * @return mixed
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed $identificacion
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerificado()
    {
        return $this->verificado;
    }

    /**
     * @param mixed $verificado
     */
    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoEmpresaFk()
    {
        return $this->codigoEmpresaFk;
    }

    /**
     * @param mixed $codigoEmpresaFk
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk)
    {
        $this->codigoEmpresaFk = $codigoEmpresaFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoRolFk()
    {
        return $this->codigoRolFk;
    }

    /**
     * @param mixed $codigoRolFk
     */
    public function setCodigoRolFk($codigoRolFk)
    {
        $this->codigoRolFk = $codigoRolFk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRolRel()
    {
        return $this->rolRel;
    }

    /**
     * @param mixed $rolRel
     */
    public function setRolRel($rolRel)
    {
        $this->rolRel = $rolRel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmpresaRel()
    {
        return $this->empresaRel;
    }

    /**
     * @param mixed $empresaRel
     */
    public function setEmpresaRel($empresaRel)
    {
        $this->empresaRel = $empresaRel;
        return $this;
    }


}

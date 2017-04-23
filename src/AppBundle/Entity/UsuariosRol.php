<?php

namespace AppBundle\Entity;

/**
 * UsuariosRol
 */
class UsuariosRol
{
    /**
     * @var integer
     */
    private $urolId;

    /**
     * @var integer
     */
    private $urolUsuId;

    /**
     * @var integer
     */
    private $urolRolId;

    /**
     * @var integer
     */
    private $urolCliId;

    /**
     * @var \AppBundle\Entity\Usuario
     */
    private $usuRolUsuarios;

    /**
     * @var \AppBundle\Entity\Cliente
     */
    private $usuRolClientes;

    /**
     * @var \AppBundle\Entity\Rol
     */
    private $usuRolRols;


    /**
     * Get urolId
     *
     * @return integer
     */
    public function getUrolId()
    {
        return $this->urolId;
    }

    /**
     * Set urolUsuId
     *
     * @param integer $urolUsuId
     *
     * @return UsuariosRol
     */
    public function setUrolUsuId($urolUsuId)
    {
        $this->urolUsuId = $urolUsuId;

        return $this;
    }

    /**
     * Get urolUsuId
     *
     * @return integer
     */
    public function getUrolUsuId()
    {
        return $this->urolUsuId;
    }

    /**
     * Set urolRolId
     *
     * @param integer $urolRolId
     *
     * @return UsuariosRol
     */
    public function setUrolRolId($urolRolId)
    {
        $this->urolRolId = $urolRolId;

        return $this;
    }

    /**
     * Get urolRolId
     *
     * @return integer
     */
    public function getUrolRolId()
    {
        return $this->urolRolId;
    }

    /**
     * Set urolCliId
     *
     * @param integer $urolCliId
     *
     * @return UsuariosRol
     */
    public function setUrolCliId($urolCliId)
    {
        $this->urolCliId = $urolCliId;

        return $this;
    }

    /**
     * Get urolCliId
     *
     * @return integer
     */
    public function getUrolCliId()
    {
        return $this->urolCliId;
    }

    /**
     * Set usuRolUsuarios
     *
     * @param \AppBundle\Entity\Usuario $usuRolUsuarios
     *
     * @return UsuariosRol
     */
    public function setUsuRolUsuarios(\AppBundle\Entity\Usuario $usuRolUsuarios = null)
    {
        $this->usuRolUsuarios = $usuRolUsuarios;

        return $this;
    }

    /**
     * Get usuRolUsuarios
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuRolUsuarios()
    {
        return $this->usuRolUsuarios;
    }

    /**
     * Set usuRolClientes
     *
     * @param \AppBundle\Entity\Cliente $usuRolClientes
     *
     * @return UsuariosRol
     */
    public function setUsuRolClientes(\AppBundle\Entity\Cliente $usuRolClientes = null)
    {
        $this->usuRolClientes = $usuRolClientes;

        return $this;
    }

    /**
     * Get usuRolClientes
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getUsuRolClientes()
    {
        return $this->usuRolClientes;
    }

    /**
     * Set usuRolRols
     *
     * @param \AppBundle\Entity\Rol $usuRolRols
     *
     * @return UsuariosRol
     */
    public function setUsuRolRols(\AppBundle\Entity\Rol $usuRolRols = null)
    {
        $this->usuRolRols = $usuRolRols;

        return $this;
    }

    /**
     * Get usuRolRols
     *
     * @return \AppBundle\Entity\Rol
     */
    public function getUsuRolRols()
    {
        return $this->usuRolRols;
    }
}

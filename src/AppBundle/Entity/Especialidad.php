<?php

namespace AppBundle\Entity;

/**
 * Especialidad
 */
class Especialidad
{
    /**
     * @var integer
     */
    private $espId;

    /**
     * @var string
     */
    private $espEspecialidad;

    /**
     * @var string
     */
    private $espCodigo;

    /**
     * @var string
     */
    private $espDescripcion;

    /**
     * @var \DateTime
     */
    private $espFechaCrea = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $espFechaMod;

    /**
     * @var boolean
     */
    private $espActivo = '1';


    /**
     * Get espId
     *
     * @return integer
     */
    public function getEspId()
    {
        return $this->espId;
    }

    /**
     * Set espEspecialidad
     *
     * @param string $espEspecialidad
     *
     * @return Especialidad
     */
    public function setEspEspecialidad($espEspecialidad)
    {
        $this->espEspecialidad = $espEspecialidad;

        return $this;
    }

    /**
     * Get espEspecialidad
     *
     * @return string
     */
    public function getEspEspecialidad()
    {
        return $this->espEspecialidad;
    }

    /**
     * Set espCodigo
     *
     * @param string $espCodigo
     *
     * @return Especialidad
     */
    public function setEspCodigo($espCodigo)
    {
        $this->espCodigo = $espCodigo;

        return $this;
    }

    /**
     * Get espCodigo
     *
     * @return string
     */
    public function getEspCodigo()
    {
        return $this->espCodigo;
    }

    /**
     * Set espDescripcion
     *
     * @param string $espDescripcion
     *
     * @return Especialidad
     */
    public function setEspDescripcion($espDescripcion)
    {
        $this->espDescripcion = $espDescripcion;

        return $this;
    }

    /**
     * Get espDescripcion
     *
     * @return string
     */
    public function getEspDescripcion()
    {
        return $this->espDescripcion;
    }

    /**
     * Set espFechaCrea
     *
     * @param \DateTime $espFechaCrea
     *
     * @return Especialidad
     */
    public function setEspFechaCrea($espFechaCrea)
    {
        $this->espFechaCrea = $espFechaCrea;

        return $this;
    }

    /**
     * Get espFechaCrea
     *
     * @return \DateTime
     */
    public function getEspFechaCrea()
    {
        return $this->espFechaCrea;
    }

    /**
     * Set espFechaMod
     *
     * @param \DateTime $espFechaMod
     *
     * @return Especialidad
     */
    public function setEspFechaMod($espFechaMod)
    {
        $this->espFechaMod = $espFechaMod;

        return $this;
    }

    /**
     * Get espFechaMod
     *
     * @return \DateTime
     */
    public function getEspFechaMod()
    {
        return $this->espFechaMod;
    }

    /**
     * Set espActivo
     *
     * @param boolean $espActivo
     *
     * @return Especialidad
     */
    public function setEspActivo($espActivo)
    {
        $this->espActivo = $espActivo;

        return $this;
    }

    /**
     * Get espActivo
     *
     * @return boolean
     */
    public function getEspActivo()
    {
        return $this->espActivo;
    }
	
	public function __toString() {
		return $this->espEspecialidad;
	}
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cliid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cliid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cliid
     *
     * @param \AppBundle\Entity\Cliente $cliid
     *
     * @return Especialidad
     */
    public function addCliid(\AppBundle\Entity\Cliente $cliid)
    {
        $this->cliid[] = $cliid;

        return $this;
    }

    /**
     * Remove cliid
     *
     * @param \AppBundle\Entity\Cliente $cliid
     */
    public function removeCliid(\AppBundle\Entity\Cliente $cliid)
    {
        $this->cliid->removeElement($cliid);
    }

    /**
     * Get cliid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCliid()
    {
        return $this->cliid;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $usuarios;


    /**
     * Add usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Especialidad
     */
    public function addUsuario(\AppBundle\Entity\Usuario $usuario)
    {
        $this->usuarios[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     */
    public function removeUsuario(\AppBundle\Entity\Usuario $usuario)
    {
        $this->usuarios->removeElement($usuario);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idUsuario;


    /**
     * Add idUsuario
     *
     * @param \AppBundle\Entity\Usuario $idUsuario
     *
     * @return Especialidad
     */
    public function addIdUsuario(\AppBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario[] = $idUsuario;

        return $this;
    }

    /**
     * Remove idUsuario
     *
     * @param \AppBundle\Entity\Usuario $idUsuario
     */
    public function removeIdUsuario(\AppBundle\Entity\Usuario $idUsuario)
    {
        $this->idUsuario->removeElement($idUsuario);
    }

    /**
     * Get idUsuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idCliente;


    /**
     * Add idCliente
     *
     * @param \AppBundle\Entity\Cliente $idCliente
     *
     * @return Especialidad
     */
    public function addIdCliente(\AppBundle\Entity\Cliente $idCliente)
    {
        $this->idCliente[] = $idCliente;

        return $this;
    }

    /**
     * Remove idCliente
     *
     * @param \AppBundle\Entity\Cliente $idCliente
     */
    public function removeIdCliente(\AppBundle\Entity\Cliente $idCliente)
    {
        $this->idCliente->removeElement($idCliente);
    }

    /**
     * Get idCliente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }
}

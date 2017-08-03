<?php

namespace AppBundle\Entity;

/**
 * EavModCampos
 */
class EavModCampos
{
    /**
     * @var integer
     */
    private $modCampId;

    /**
     * @var integer
     */
    private $modCampModSeccId;

    /**
     * @var string
     */
    private $modCampNombre;

    /**
     * @var string
     */
    private $modCampNombreCorto;

    /**
     * @var integer
     */
    private $modCampShowIfnull = false;

    /**
     * @var string
     */
    private $modCampValorDefault;

    /**
     * @var integer
     */
    private $modCampCampoPadre;

    /**
     * @var integer
     */
    private $modCampRequerido = false;

    /**
     * @var integer
     */
    private $modCampTipCampId;

    /**
     * @var integer
     */
    private $modCampOrden;

    /**
     * @var integer
     */
    private $modCampActivo = true;

    /**
     * @var \DateTime
     */
    private $modCampFechaCrea = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $modCampFechaMod;

    /**
     * @var \AppBundle\Entity\EavTipCampos
     */
    private $tipoCampos;

    /**
     * @var \AppBundle\Entity\EavModSeccion
     */
    private $modSeccion;
    
    public function __toString() {
        return $this->modCampNombre;
    }


    /**
     * Get modCampId
     *
     * @return integer
     */
    public function getModCampId()
    {
        return $this->modCampId;
    }

    /**
     * Set modCampModSeccId
     *
     * @param integer $modCampModSeccId
     *
     * @return EavModCampos
     */
    public function setModCampModSeccId($modCampModSeccId)
    {
        $this->modCampModSeccId = $modCampModSeccId;

        return $this;
    }

    /**
     * Get modCampModSeccId
     *
     * @return integer
     */
    public function getModCampModSeccId()
    {
        return $this->modCampModSeccId;
    }

    /**
     * Set modCampNombre
     *
     * @param string $modCampNombre
     *
     * @return EavModCampos
     */
    public function setModCampNombre($modCampNombre)
    {
        $this->modCampNombre = $modCampNombre;

        return $this;
    }

    /**
     * Get modCampNombre
     *
     * @return string
     */
    public function getModCampNombre()
    {
        return $this->modCampNombre;
    }

    /**
     * Set modCampNombreCorto
     *
     * @param string $modCampNombreCorto
     *
     * @return EavModCampos
     */
    public function setModCampNombreCorto($modCampNombreCorto)
    {
        $this->modCampNombreCorto = $modCampNombreCorto;

        return $this;
    }

    /**
     * Get modCampNombreCorto
     *
     * @return string
     */
    public function getModCampNombreCorto()
    {
        return $this->modCampNombreCorto;
    }

    /**
     * Set modCampShowIfnull
     *
     * @param integer $modCampShowIfnull
     *
     * @return EavModCampos
     */
    public function setModCampShowIfnull($modCampShowIfnull)
    {
        $this->modCampShowIfnull = $modCampShowIfnull;

        return $this;
    }

    /**
     * Get modCampShowIfnull
     *
     * @return integer
     */
    public function getModCampShowIfnull()
    {
        return $this->modCampShowIfnull;
    }

    /**
     * Set modCampValorDefault
     *
     * @param string $modCampValorDefault
     *
     * @return EavModCampos
     */
    public function setModCampValorDefault($modCampValorDefault)
    {
        $this->modCampValorDefault = $modCampValorDefault;

        return $this;
    }

    /**
     * Get modCampValorDefault
     *
     * @return string
     */
    public function getModCampValorDefault()
    {
        return $this->modCampValorDefault;
    }

    /**
     * Set modCampCampoPadre
     *
     * @param integer $modCampCampoPadre
     *
     * @return EavModCampos
     */
    public function setModCampCampoPadre($modCampCampoPadre)
    {
        $this->modCampCampoPadre = $modCampCampoPadre;

        return $this;
    }

    /**
     * Get modCampCampoPadre
     *
     * @return integer
     */
    public function getModCampCampoPadre()
    {
        return $this->modCampCampoPadre;
    }

    /**
     * Set modCampRequerido
     *
     * @param integer $modCampRequerido
     *
     * @return EavModCampos
     */
    public function setModCampRequerido($modCampRequerido)
    {
        $this->modCampRequerido = $modCampRequerido;

        return $this;
    }

    /**
     * Get modCampRequerido
     *
     * @return integer
     */
    public function getModCampRequerido()
    {
        return $this->modCampRequerido;
    }

    /**
     * Set modCampTipCampId
     *
     * @param integer $modCampTipCampId
     *
     * @return EavModCampos
     */
    public function setModCampTipCampId($modCampTipCampId)
    {
        $this->modCampTipCampId = $modCampTipCampId;

        return $this;
    }

    /**
     * Get modCampTipCampId
     *
     * @return integer
     */
    public function getModCampTipCampId()
    {
        return $this->modCampTipCampId;
    }

    /**
     * Set modCampOrden
     *
     * @param integer $modCampOrden
     *
     * @return EavModCampos
     */
    public function setModCampOrden($modCampOrden)
    {
        $this->modCampOrden = $modCampOrden;

        return $this;
    }

    /**
     * Get modCampOrden
     *
     * @return integer
     */
    public function getModCampOrden()
    {
        return $this->modCampOrden;
    }

    /**
     * Set modCampActivo
     *
     * @param integer $modCampActivo
     *
     * @return EavModCampos
     */
    public function setModCampActivo($modCampActivo)
    {
        $this->modCampActivo = $modCampActivo;

        return $this;
    }

    /**
     * Get modCampActivo
     *
     * @return integer
     */
    public function getModCampActivo()
    {
        return $this->modCampActivo;
    }

    /**
     * Set modCampFechaCrea
     *
     * @param \DateTime $modCampFechaCrea
     *
     * @return EavModCampos
     */
    public function setModCampFechaCrea($modCampFechaCrea)
    {
        $this->modCampFechaCrea = $modCampFechaCrea;

        return $this;
    }

    /**
     * Get modCampFechaCrea
     *
     * @return \DateTime
     */
    public function getModCampFechaCrea()
    {
        return $this->modCampFechaCrea;
    }

    /**
     * Set modCampFechaMod
     *
     * @param \DateTime $modCampFechaMod
     *
     * @return EavModCampos
     */
    public function setModCampFechaMod($modCampFechaMod)
    {
        $this->modCampFechaMod = $modCampFechaMod;

        return $this;
    }

    /**
     * Get modCampFechaMod
     *
     * @return \DateTime
     */
    public function getModCampFechaMod()
    {
        return $this->modCampFechaMod;
    }

    /**
     * Set tipoCampos
     *
     * @param \AppBundle\Entity\EavTipCampos $tipoCampos
     *
     * @return EavModCampos
     */
    public function setTipoCampos(\AppBundle\Entity\EavTipCampos $tipoCampos = null)
    {
        $this->tipoCampos = $tipoCampos;

        return $this;
    }

    /**
     * Get tipoCampos
     *
     * @return \AppBundle\Entity\EavTipCampos
     */
    public function getTipoCampos()
    {
        return $this->tipoCampos;
    }

    /**
     * Set modSeccion
     *
     * @param \AppBundle\Entity\EavModSeccion $modSeccion
     *
     * @return EavModCampos
     */
    public function setModSeccion(\AppBundle\Entity\EavModSeccion $modSeccion = null)
    {
        $this->modSeccion = $modSeccion;

        return $this;
    }

    /**
     * Get modSeccion
     *
     * @return \AppBundle\Entity\EavModSeccion
     */
    public function getModSeccion()
    {
        return $this->modSeccion;
    }
    /**
     * @var boolean
     */
    private $modCampEsCatalogo = false;


    /**
     * Set modCampEsCatalogo
     *
     * @param boolean $modCampEsCatalogo
     *
     * @return EavModCampos
     */
    public function setModCampEsCatalogo($modCampEsCatalogo)
    {
        $this->modCampEsCatalogo = $modCampEsCatalogo;

        return $this;
    }

    /**
     * Get modCampEsCatalogo
     *
     * @return boolean
     */
    public function getModCampEsCatalogo()
    {
        return $this->modCampEsCatalogo;
    }
    /**
     * @var \AppBundle\Entity\EavModSeccion
     */
    private $seccionCampo;


    /**
     * Set seccionCampo
     *
     * @param \AppBundle\Entity\EavModSeccion $seccionCampo
     *
     * @return EavModCampos
     */
    public function setSeccionCampo(\AppBundle\Entity\EavModSeccion $seccionCampo = null)
    {
        $this->seccionCampo = $seccionCampo;

        return $this;
    }

    /**
     * Get seccionCampo
     *
     * @return \AppBundle\Entity\EavModSeccion
     */
    public function getSeccionCampo()
    {
        return $this->seccionCampo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $camposHijo;

    /**
     * @var \AppBundle\Entity\EavModCampos
     */
    private $campoPadre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->camposHijo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add camposHijo
     *
     * @param \AppBundle\Entity\EavModCampos $camposHijo
     *
     * @return EavModCampos
     */
    public function addCamposHijo(\AppBundle\Entity\EavModCampos $camposHijo)
    {
        $this->camposHijo[] = $camposHijo;

        return $this;
    }

    /**
     * Remove camposHijo
     *
     * @param \AppBundle\Entity\EavModCampos $camposHijo
     */
    public function removeCamposHijo(\AppBundle\Entity\EavModCampos $camposHijo)
    {
        $this->camposHijo->removeElement($camposHijo);
    }

    /**
     * Get camposHijo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCamposHijo()
    {
        return $this->camposHijo;
    }

    /**
     * Set campoPadre
     *
     * @param \AppBundle\Entity\EavModCampos $campoPadre
     *
     * @return EavModCampos
     */
    public function setCampoPadre(\AppBundle\Entity\EavModCampos $campoPadre = null)
    {
        $this->campoPadre = $campoPadre;

        return $this;
    }

    /**
     * Get campoPadre
     *
     * @return \AppBundle\Entity\EavModCampos
     */
    public function getCampoPadre()
    {
        return $this->campoPadre;
    }
    /**
     * @var \AppBundle\Entity\EavModSeccion
     */
    private $modCampModSecc;

    /**
     * @var \AppBundle\Entity\EavTipCampos
     */
    private $modCampTipCamp;


    /**
     * Set modCampModSecc
     *
     * @param \AppBundle\Entity\EavModSeccion $modCampModSecc
     *
     * @return EavModCampos
     */
    public function setModCampModSecc(\AppBundle\Entity\EavModSeccion $modCampModSecc = null)
    {
        $this->modCampModSecc = $modCampModSecc;

        return $this;
    }

    /**
     * Get modCampModSecc
     *
     * @return \AppBundle\Entity\EavModSeccion
     */
    public function getModCampModSecc()
    {
        return $this->modCampModSecc;
    }

    /**
     * Set modCampTipCamp
     *
     * @param \AppBundle\Entity\EavTipCampos $modCampTipCamp
     *
     * @return EavModCampos
     */
    public function setModCampTipCamp(\AppBundle\Entity\EavTipCampos $modCampTipCamp = null)
    {
        $this->modCampTipCamp = $modCampTipCamp;

        return $this;
    }

    /**
     * Get modCampTipCamp
     *
     * @return \AppBundle\Entity\EavTipCampos
     */
    public function getModCampTipCamp()
    {
        return $this->modCampTipCamp;
    }
}

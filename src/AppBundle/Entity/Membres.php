<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membres
 *
 * @ORM\Table(name="membres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembresRepository")
 */
class Membres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_pseudo", type="string", length=255)
     */
    private $membrePseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_pass", type="string", length=255)
     */
    private $membrePass;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_tel", type="string", length=15, nullable=true)
     */
    private $membreTel;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_mail", type="string", length=255, nullable=true)
     */
    private $membreMail;

    /**
     * @var bool
     *
     * @ORM\Column(name="membre_orga", type="boolean")
     */
    private $membreOrga;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="membre_date_inscription", type="datetime")
     */
    private $membreDateInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="membre_derniere_connexion", type="datetime")
     */
    private $membreDerniereConnexion;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_ip_inscription", type="string", length=255, nullable=true)
     */
    private $membreIpInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_ip_derniere_connexion", type="string", length=255, nullable=true)
     */
    private $membreIpDerniereConnexion;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_code_validation", type="string", length=255)
     */
    private $membreCodeValidation;

    /**
     * @var bool
     *
     * @ORM\Column(name="membre_validation", type="boolean")
     */
    private $membreValidation;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_dpt_code", type="string", length=255)
     */
    private $membreDptCode;

    /**
     * @var Avatars
     *
     * @ORM\ManyToOne(targetEntity="Avatars", inversedBy="membres")
     */
    private $membreAvatar;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set membrePseudo
     *
     * @param string $membrePseudo
     *
     * @return Membres
     */
    public function setMembrePseudo($membrePseudo)
    {
        $this->membrePseudo = $membrePseudo;

        return $this;
    }

    /**
     * Get membrePseudo
     *
     * @return string
     */
    public function getMembrePseudo()
    {
        return $this->membrePseudo;
    }

    /**
     * Set membrePass
     *
     * @param string $membrePass
     *
     * @return Membres
     */
    public function setMembrePass($membrePass)
    {
        $this->membrePass = $membrePass;

        return $this;
    }

    /**
     * Get membrePass
     *
     * @return string
     */
    public function getMembrePass()
    {
        return $this->membrePass;
    }

    /**
     * Set membreTel
     *
     * @param string $membreTel
     *
     * @return Membres
     */
    public function setMembreTel($membreTel)
    {
        $this->membreTel = $membreTel;

        return $this;
    }

    /**
     * Get membreTel
     *
     * @return string
     */
    public function getMembreTel()
    {
        return $this->membreTel;
    }

    /**
     * Set membreMail
     *
     * @param string $membreMail
     *
     * @return Membres
     */
    public function setMembreMail($membreMail)
    {
        $this->membreMail = $membreMail;

        return $this;
    }

    /**
     * Get membreMail
     *
     * @return string
     */
    public function getMembreMail()
    {
        return $this->membreMail;
    }

    /**
     * Set membreOrga
     *
     * @param boolean $membreOrga
     *
     * @return Membres
     */
    public function setMembreOrga($membreOrga)
    {
        $this->membreOrga = $membreOrga;

        return $this;
    }

    /**
     * Get membreOrga
     *
     * @return bool
     */
    public function getMembreOrga()
    {
        return $this->membreOrga;
    }

    /**
     * Set membreDateInscription
     *
     * @param \DateTime $membreDateInscription
     *
     * @return Membres
     */
    public function setMembreDateInscription($membreDateInscription)
    {
        $this->membreDateInscription = $membreDateInscription;

        return $this;
    }

    /**
     * Get membreDateInscription
     *
     * @return \DateTime
     */
    public function getMembreDateInscription()
    {
        return $this->membreDateInscription;
    }

    /**
     * Set membreDerniereConnexion
     *
     * @param \DateTime $membreDerniereConnexion
     *
     * @return Membres
     */
    public function setMembreDerniereConnexion($membreDerniereConnexion)
    {
        $this->membreDerniereConnexion = $membreDerniereConnexion;

        return $this;
    }

    /**
     * Get membreDerniereConnexion
     *
     * @return \DateTime
     */
    public function getMembreDerniereConnexion()
    {
        return $this->membreDerniereConnexion;
    }

    /**
     * Set membreIpInscription
     *
     * @param string $membreIpInscription
     *
     * @return Membres
     */
    public function setMembreIpInscription($membreIpInscription)
    {
        $this->membreIpInscription = $membreIpInscription;

        return $this;
    }

    /**
     * Get membreIpInscription
     *
     * @return string
     */
    public function getMembreIpInscription()
    {
        return $this->membreIpInscription;
    }

    /**
     * Set membreIpDerniereConnexion
     *
     * @param string $membreIpDerniereConnexion
     *
     * @return Membres
     */
    public function setMembreIpDerniereConnexion($membreIpDerniereConnexion)
    {
        $this->membreIpDerniereConnexion = $membreIpDerniereConnexion;

        return $this;
    }

    /**
     * Get membreIpDerniereConnexion
     *
     * @return string
     */
    public function getMembreIpDerniereConnexion()
    {
        return $this->membreIpDerniereConnexion;
    }

    /**
     * Set membreCodeValidation
     *
     * @param string $membreCodeValidation
     *
     * @return Membres
     */
    public function setMembreCodeValidation($membreCodeValidation)
    {
        $this->membreCodeValidation = $membreCodeValidation;

        return $this;
    }

    /**
     * Get membreCodeValidation
     *
     * @return string
     */
    public function getMembreCodeValidation()
    {
        return $this->membreCodeValidation;
    }

    /**
     * Set membreValidation
     *
     * @param boolean $membreValidation
     *
     * @return Membres
     */
    public function setMembreValidation($membreValidation)
    {
        $this->membreValidation = $membreValidation;

        return $this;
    }

    /**
     * Get membreValidation
     *
     * @return bool
     */
    public function getMembreValidation()
    {
        return $this->membreValidation;
    }

    /**
     * Set membreDptCode
     *
     * @param string $membreDptCode
     *
     * @return Membres
     */
    public function setMembreDptCode($membreDptCode)
    {
        $this->membreDptCode = $membreDptCode;

        return $this;
    }

    /**
     * Get membreDptCode
     *
     * @return string
     */
    public function getMembreDptCode()
    {
        return $this->membreDptCode;
    }

    /**
     * Set membreAvatar
     *
     * @param Avatars $membreAvatar
     *
     * @return Membres
     */
    public function setMembreAvatar($membreAvatar)
    {
        $this->membreAvatar = $membreAvatar;

        return $this;
    }

    /**
     * Get membreAvatar
     *
     * @return Avatars
     */
    public function getMembreAvatar()
    {
        return $this->membreAvatar;
    }
}


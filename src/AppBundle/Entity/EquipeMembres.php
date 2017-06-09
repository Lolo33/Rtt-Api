<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EquipeMembres
 *
 * @ORM\Table(name="equipe_membres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipeMembresRepository")
 */
class EquipeMembres
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
     * @ORM\OneToOne(targetEntity="Membres")
     */
    private $emMembre;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Equipes")
     */
    private $emTeam;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="StatutJoueur")
     */
    private $emStatutJoueur;

    /**
     * @var bool
     *
     * @ORM\Column(name="em_membre_paye", type="boolean")
     */
    private $emMembrePaye;

    /**
     * @var string
     *
     * @ORM\Column(name="em_pay_id", type="string", length=255, nullable=true)
     */
    private $emPayId;


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
     * Set emMembre
     *
     * @param string $emMembre
     *
     * @return EquipeMembres
     */
    public function setEmMembre($emMembre)
    {
        $this->emMembre = $emMembre;

        return $this;
    }

    /**
     * Get emMembre
     *
     * @return string
     */
    public function getEmMembre()
    {
        return $this->emMembre;
    }

    /**
     * Set emTeam
     *
     * @param string $emTeam
     *
     * @return EquipeMembres
     */
    public function setEmTeam($emTeam)
    {
        $this->emTeam = $emTeam;

        return $this;
    }

    /**
     * Get emTeam
     *
     * @return string
     */
    public function getEmTeam()
    {
        return $this->emTeam;
    }

    /**
     * Set emStatutJoueur
     *
     * @param string $emStatutJoueur
     *
     * @return EquipeMembres
     */
    public function setEmStatutJoueur($emStatutJoueur)
    {
        $this->emStatutJoueur = $emStatutJoueur;

        return $this;
    }

    /**
     * Get emStatutJoueur
     *
     * @return string
     */
    public function getEmStatutJoueur()
    {
        return $this->emStatutJoueur;
    }

    /**
     * Set emMembrePaye
     *
     * @param boolean $emMembrePaye
     *
     * @return EquipeMembres
     */
    public function setEmMembrePaye($emMembrePaye)
    {
        $this->emMembrePaye = $emMembrePaye;

        return $this;
    }

    /**
     * Get emMembrePaye
     *
     * @return bool
     */
    public function getEmMembrePaye()
    {
        return $this->emMembrePaye;
    }

    /**
     * Set emPayId
     *
     * @param string $emPayId
     *
     * @return EquipeMembres
     */
    public function setEmPayId($emPayId)
    {
        $this->emPayId = $emPayId;

        return $this;
    }

    /**
     * Get emPayId
     *
     * @return string
     */
    public function getEmPayId()
    {
        return $this->emPayId;
    }
}


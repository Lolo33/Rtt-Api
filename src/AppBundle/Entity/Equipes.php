<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes
 *
 * @ORM\Table(name="equipes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipesRepository")
 */
class Equipes
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
     * @ORM\Column(name="team_nom", type="string", length=255)
     */
    private $teamNom;

    /**
     * @var string
     *
     * @ORM\Column(name="team_code", type="string", length=255)
     */
    private $teamCode;

    /**
     * @var bool
     *
     * @ORM\Column(name="team_prive", type="boolean")
     */
    private $teamPrive;

    /**
     * @var string
     *
     * @ORM\Column(name="team_pass", type="string", length=255, nullable=true)
     */
    private $teamPass;

    /**
     * @ORM\ManyToOne(targetEntity="Evenements", inversedBy="eventListeEquipes")
     */
    private $teamEvent;


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
     * Set teamNom
     *
     * @param string $teamNom
     *
     * @return Equipes
     */
    public function setTeamNom($teamNom)
    {
        $this->teamNom = $teamNom;

        return $this;
    }

    /**
     * Get teamNom
     *
     * @return string
     */
    public function getTeamNom()
    {
        return $this->teamNom;
    }

    /**
     * Set teamCode
     *
     * @param string $teamCode
     *
     * @return Equipes
     */
    public function setTeamCode($teamCode)
    {
        $this->teamCode = $teamCode;

        return $this;
    }

    /**
     * Get teamCode
     *
     * @return string
     */
    public function getTeamCode()
    {
        return $this->teamCode;
    }

    /**
     * Set teamPrive
     *
     * @param boolean $teamPrive
     *
     * @return Equipes
     */
    public function setTeamPrive($teamPrive)
    {
        $this->teamPrive = $teamPrive;

        return $this;
    }

    /**
     * Get teamPrive
     *
     * @return bool
     */
    public function getTeamPrive()
    {
        return $this->teamPrive;
    }

    /**
     * Set teamPass
     *
     * @param string $teamPass
     *
     * @return Equipes
     */
    public function setTeamPass($teamPass)
    {
        $this->teamPass = $teamPass;

        return $this;
    }

    /**
     * Get teamPass
     *
     * @return string
     */
    public function getTeamPass()
    {
        return $this->teamPass;
    }

    /**
     * Set teamEvent
     *
     * @param Evenements $teamEvent
     *
     * @return Equipes
     */
    public function setTeamEvent($teamEvent)
    {
        $this->teamEvent = $teamEvent;

        return $this;
    }

    /**
     * Get teamEvent
     *
     * @return Evenements
     */
    public function getTeamEvent()
    {
        return $this->teamEvent;
    }
}


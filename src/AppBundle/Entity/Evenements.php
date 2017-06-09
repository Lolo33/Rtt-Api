<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evenements
 *
 * @ORM\Table(name="evenements")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvenementsRepository")
 */
class Evenements
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
     * @ORM\Column(name="event_titre", type="string", length=255)
     */
    private $eventTitre;

    /**
     * @var int
     *
     * @ORM\Column(name="event_nb_equipes", type="integer")
     */
    private $eventNbEquipes;

    /**
     * @var int
     *
     * @ORM\Column(name="event_joueurs_max", type="integer")
     */
    private $eventJoueursMax;

    /**
     * @var int
     *
     * @ORM\Column(name="event_joueurs_min", type="integer")
     */
    private $eventJoueursMin;

    /**
     * @var bool
     *
     * @ORM\Column(name="event_paiement", type="boolean")
     */
    private $eventPaiement;

    /**
     * @var float
     *
     * @ORM\Column(name="event_tarif", type="float")
     */
    private $eventTarif;

    /**
     * @var Lieux
     *
     * @ORM\ManyToOne(targetEntity="Lieux", inversedBy="listeEvents")
     */
    private $eventLieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="date")
     */
    private $eventDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_heure_debut", type="time")
     */
    private $eventHeureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_heure_fin", type="time")
     */
    private $eventHeureFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="event_prive", type="boolean")
     */
    private $eventPrive;

    /**
     * @var string
     *
     * @ORM\Column(name="event_pass", type="string", length=255, nullable=true)
     */
    private $eventPass;

    /**
     * @var Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     */
    private $eventCompte;

    /**
     * @var InfosMango
     *
     * @ORM\ManyToOne(targetEntity="InfosMango")
     */
    private $eventMango;

    /**
     * @var bool
     *
     * @ORM\Column(name="event_tarification_equipe", type="boolean")
     */
    private $eventTarificationEquipe;

    /**
     * @var Membres
     *
     * @ORM\ManyToOne(targetEntity="Membres")
     */
    private $eventOrga;

    /**
     * @var Membres
     *
     * @ORM\ManyToOne(targetEntity="Membres")
     */
    private $eventOrga2;

    /**
     * @var string
     *
     * @ORM\Column(name="event_img", type="string", length=255, nullable=true)
     */
    private $eventImg;

    /**
     * @var string
     *
     * @ORM\Column(name="event_descriptif", type="text", nullable=true)
     */
    private $eventDescriptif;

    /**
     * @var bool
     *
     * @ORM\Column(name="event_tournoi", type="boolean")
     */
    private $eventTournoi;

    /**
     * @var Equipes[]
     *
     * @ORM\OneToMany(targetEntity="Equipes", mappedBy="teamEvent")
     */
    private $eventListeEquipes;


    public function __construct()
    {
        $this->eventListeEquipes = new ArrayCollection();
    }


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
     * Set eventTitre
     *
     * @param string $eventTitre
     *
     * @return Evenements
     */
    public function setEventTitre($eventTitre)
    {
        $this->eventTitre = $eventTitre;

        return $this;
    }

    /**
     * Get eventTitre
     *
     * @return string
     */
    public function getEventTitre()
    {
        return $this->eventTitre;
    }

    /**
     * Set eventNbEquipes
     *
     * @param integer $eventNbEquipes
     *
     * @return Evenements
     */
    public function setEventNbEquipes($eventNbEquipes)
    {
        $this->eventNbEquipes = $eventNbEquipes;

        return $this;
    }

    /**
     * Get eventNbEquipes
     *
     * @return int
     */
    public function getEventNbEquipes()
    {
        return $this->eventNbEquipes;
    }

    /**
     * Set eventJoueursMax
     *
     * @param integer $eventJoueursMax
     *
     * @return Evenements
     */
    public function setEventJoueursMax($eventJoueursMax)
    {
        $this->eventJoueursMax = $eventJoueursMax;

        return $this;
    }

    /**
     * Get eventJoueursMax
     *
     * @return int
     */
    public function getEventJoueursMax()
    {
        return $this->eventJoueursMax;
    }

    /**
     * Set eventJoueursMin
     *
     * @param integer $eventJoueursMin
     *
     * @return Evenements
     */
    public function setEventJoueursMin($eventJoueursMin)
    {
        $this->eventJoueursMin = $eventJoueursMin;

        return $this;
    }

    /**
     * Get eventJoueursMin
     *
     * @return int
     */
    public function getEventJoueursMin()
    {
        return $this->eventJoueursMin;
    }

    /**
     * Set eventPaiement
     *
     * @param boolean $eventPaiement
     *
     * @return Evenements
     */
    public function setEventPaiement($eventPaiement)
    {
        $this->eventPaiement = $eventPaiement;

        return $this;
    }

    /**
     * Get eventPaiement
     *
     * @return bool
     */
    public function getEventPaiement()
    {
        return $this->eventPaiement;
    }

    /**
     * Set eventTarif
     *
     * @param float $eventTarif
     *
     * @return Evenements
     */
    public function setEventTarif($eventTarif)
    {
        $this->eventTarif = $eventTarif;

        return $this;
    }

    /**
     * Get eventTarif
     *
     * @return float
     */
    public function getEventTarif()
    {
        return $this->eventTarif;
    }

    /**
     * Set eventLieu
     *
     * @param string $eventLieu
     *
     * @return Evenements
     */
    public function setEventLieu($eventLieu)
    {
        $this->eventLieu = $eventLieu;

        return $this;
    }

    /**
     * Get eventLieu
     *
     * @return string
     */
    public function getEventLieu()
    {
        return $this->eventLieu;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return Evenements
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set eventHeureDebut
     *
     * @param \DateTime $eventHeureDebut
     *
     * @return Evenements
     */
    public function setEventHeureDebut($eventHeureDebut)
    {
        $this->eventHeureDebut = $eventHeureDebut;

        return $this;
    }

    /**
     * Get eventHeureDebut
     *
     * @return \DateTime
     */
    public function getEventHeureDebut()
    {
        return $this->eventHeureDebut;
    }

    /**
     * Set eventHeureFin
     *
     * @param \DateTime $eventHeureFin
     *
     * @return Evenements
     */
    public function setEventHeureFin($eventHeureFin)
    {
        $this->eventHeureFin = $eventHeureFin;

        return $this;
    }

    /**
     * Get eventHeureFin
     *
     * @return \DateTime
     */
    public function getEventHeureFin()
    {
        return $this->eventHeureFin;
    }

    /**
     * Set eventPrive
     *
     * @param boolean $eventPrive
     *
     * @return Evenements
     */
    public function setEventPrive($eventPrive)
    {
        $this->eventPrive = $eventPrive;

        return $this;
    }

    /**
     * Get eventPrive
     *
     * @return bool
     */
    public function getEventPrive()
    {
        return $this->eventPrive;
    }

    /**
     * Set eventPass
     *
     * @param string $eventPass
     *
     * @return Evenements
     */
    public function setEventPass($eventPass)
    {
        $this->eventPass = $eventPass;

        return $this;
    }

    /**
     * Get eventPass
     *
     * @return string
     */
    public function getEventPass()
    {
        return $this->eventPass;
    }

    /**
     * Set eventCompte
     *
     * @param Comptes $eventCompte
     *
     * @return Evenements
     */
    public function setEventCompte($eventCompte)
    {
        $this->eventCompte = $eventCompte;

        return $this;
    }

    /**
     * Get eventCompte
     *
     * @return Comptes
     */
    public function getEventCompte()
    {
        return $this->eventCompte;
    }

    /**
     * Set eventMango
     *
     * @param InfosMango $eventMango
     *
     * @return Evenements
     */
    public function setEventMango($eventMango)
    {
        $this->eventMango = $eventMango;

        return $this;
    }

    /**
     * Get eventMango
     *
     * @return InfosMango
     */
    public function getEventMango()
    {
        return $this->eventMango;
    }

    /**
     * Set eventTarificationEquipe
     *
     * @param boolean $eventTarificationEquipe
     *
     * @return Evenements
     */
    public function setEventTarificationEquipe($eventTarificationEquipe)
    {
        $this->eventTarificationEquipe = $eventTarificationEquipe;

        return $this;
    }

    /**
     * Get eventTarificationEquipe
     *
     * @return bool
     */
    public function getEventTarificationEquipe()
    {
        return $this->eventTarificationEquipe;
    }

    /**
     * Set eventOrga
     *
     * @param Membres $eventOrga
     *
     * @return Evenements
     */
    public function setEventOrga($eventOrga)
    {
        $this->eventOrga = $eventOrga;

        return $this;
    }

    /**
     * Get eventOrga
     *
     * @return Membres
     */
    public function getEventOrga()
    {
        return $this->eventOrga;
    }

    /**
     * Set eventOrga2
     *
     * @param Membres $eventOrga2
     *
     * @return Evenements
     */
    public function setEventOrga2($eventOrga2)
    {
        $this->eventOrga2 = $eventOrga2;

        return $this;
    }

    /**
     * Get eventOrga2
     *
     * @return Membres
     */
    public function getEventOrga2()
    {
        return $this->eventOrga2;
    }

    /**
     * Set eventImg
     *
     * @param string $eventImg
     *
     * @return Evenements
     */
    public function setEventImg($eventImg)
    {
        $this->eventImg = $eventImg;

        return $this;
    }

    /**
     * Get eventImg
     *
     * @return string
     */
    public function getEventImg()
    {
        return $this->eventImg;
    }

    /**
     * Set eventDescriptif
     *
     * @param string $eventDescriptif
     *
     * @return Evenements
     */
    public function setEventDescriptif($eventDescriptif)
    {
        $this->eventDescriptif = $eventDescriptif;

        return $this;
    }

    /**
     * Get eventDescriptif
     *
     * @return string
     */
    public function getEventDescriptif()
    {
        return $this->eventDescriptif;
    }

    /**
     * Set eventTournoi
     *
     * @param boolean $eventTournoi
     *
     * @return Evenements
     */
    public function setEventTournoi($eventTournoi)
    {
        $this->eventTournoi = $eventTournoi;

        return $this;
    }

    /**
     * Get eventTournoi
     *
     * @return bool
     */
    public function getEventTournoi()
    {
        return $this->eventTournoi;
    }

    /**
     * Set eventListeEquipes
     *
     * @param Equipes[] $eventTournoi
     *
     * @return Evenements
     */
    public function setEventListeEquipes($eventListeEquipes)
    {
        $this->eventListeEquipes = $eventListeEquipes;

        return $this;
    }

    /**
     * Get eventListeEquipes
     *
     * @return Equipes[]
     */
    public function getEventListeEquipes()
    {
        return $this->eventListeEquipes;
    }
}


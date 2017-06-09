<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lieux
 *
 * @ORM\Table(name="lieux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LieuxRepository")
 */
class Lieux
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
     * @Assert\NotNull()
     * @ORM\Column(name="lieu_cp", type="string", length=255)
     */
    private $lieuCp;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="lieu_ville", type="string", length=255)
     */
    private $lieuVille;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="lieu_nom", type="string", length=255)
     */
    private $lieuNom;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="lieu_adresse_l1", type="string", length=255)
     */
    private $lieuAdresseL1;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_adresse_l2", type="string", length=255, nullable=true)
     */
    private $lieuAdresseL2;

    /**
     * @var Departements
     *
     * @ORM\ManyToOne(targetEntity="Departements", inversedBy="lieux")
     */
    private $lieuDpt;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_logo", type="string", length=255, nullable=true)
     */
    private $lieuLogo;

    /**
     * @ORM\OneToMany(targetEntity="Evenements", mappedBy="eventLieu")
     *
     * @var Evenements[]
     */
    private $listeEvents;



    public function __construct()
    {
        $this->listeEvent = new ArrayCollection();
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
     * Set lieuCp
     *
     * @param string $lieuCp
     *
     * @return Lieux
     */
    public function setLieuCp($lieuCp)
    {
        $this->lieuCp = $lieuCp;

        return $this;
    }

    /**
     * Get lieuCp
     *
     * @return string
     */
    public function getLieuCp()
    {
        return $this->lieuCp;
    }

    /**
     * Set lieuVille
     *
     * @param string $lieuVille
     *
     * @return Lieux
     */
    public function setLieuVille($lieuVille)
    {
        $this->lieuVille = $lieuVille;

        return $this;
    }

    /**
     * Get lieuVille
     *
     * @return string
     */
    public function getLieuVille()
    {
        return $this->lieuVille;
    }

    /**
     * Set lieuNom
     *
     * @param string $lieuNom
     *
     * @return Lieux
     */
    public function setLieuNom($lieuNom)
    {
        $this->lieuNom = $lieuNom;

        return $this;
    }

    /**
     * Get lieuNom
     *
     * @return string
     */
    public function getLieuNom()
    {
        return $this->lieuNom;
    }

    /**
     * Set lieuAdresseL1
     *
     * @param string $lieuAdresseL1
     *
     * @return Lieux
     */
    public function setLieuAdresseL1($lieuAdresseL1)
    {
        $this->lieuAdresseL1 = $lieuAdresseL1;

        return $this;
    }

    /**
     * Get lieuAdresseL1
     *
     * @return string
     */
    public function getLieuAdresseL1()
    {
        return $this->lieuAdresseL1;
    }

    /**
     * Set lieuAdresseL2
     *
     * @param string $lieuAdresseL2
     *
     * @return Lieux
     */
    public function setLieuAdresseL2($lieuAdresseL2)
    {
        $this->lieuAdresseL2 = $lieuAdresseL2;

        return $this;
    }

    /**
     * Get lieuAdresseL2
     *
     * @return string
     */
    public function getLieuAdresseL2()
    {
        return $this->lieuAdresseL2;
    }

    /**
     * Set lieuDptId
     *
     * @param integer $lieuDptId
     *
     * @return Lieux
     */
    public function setLieuDpt($lieuDpt)
    {
        $this->lieuDpt = $lieuDpt;

        return $this;
    }

    /**
     * Get lieuDptId
     *
     * @return Departements
     */
    public function getLieuDpt()
    {
        return $this->lieuDpt;
    }

    /**
     * Set lieuLogo
     *
     * @param string $lieuLogo
     *
     * @return Lieux
     */
    public function setLieuLogo($lieuLogo)
    {
        $this->lieuLogo = $lieuLogo;

        return $this;
    }

    /**
     * Get lieuLogo
     *
     * @return string
     */
    public function getLieuLogo()
    {
        return $this->lieuLogo;
    }

    /**
     * Set listeEvents
     *
     * @param Evenements[] $listeEvents
     *
     * @return Lieux
     */
    public function setListeEvents($listeEvents)
    {
        $this->listeEvents = $listeEvents;

        return $this;
    }

    /**
     * Get listeEvents
     *
     * @return Evenements[]
     */
    public function getListeEvents()
    {
        return $this->listeEvents;
    }

}


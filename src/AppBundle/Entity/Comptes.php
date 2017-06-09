<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comptes
 *
 * @ORM\Table(name="comptes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComptesRepository")
 */
class Comptes
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
     * @ORM\Column(name="compte_rib_bic", type="string", length=255, nullable=true)
     */
    private $compteRibBic;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_rib_iban", type="string", length=255)
     */
    private $compteRibIban;

    /**
     * @var Membres
     *
     * @ORM\ManyToOne(targetEntity="Membres", inversedBy="membreComptes")
     */
    private $compteMembre;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_nom", type="string", length=255)
     */
    private $compteNom;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_prenom", type="string", length=255)
     */
    private $comptePrenom;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_adresse_l1", type="string", length=255)
     */
    private $compteAdresseL1;

    /**
     * @var string
     *
     * @ORM\Column(name="compte_adresse_l2", type="string", length=255, nullable=true)
     */
    private $compteAdresseL2;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_cp", type="string", length=255)
     */
    private $compteCp;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @ORM\Column(name="compte_ville", type="string", length=255)
     */
    private $compteVille;


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
     * Set compteRibBic
     *
     * @param string $compteRibBic
     *
     * @return Comptes
     */
    public function setCompteRibBic($compteRibBic)
    {
        $this->compteRibBic = $compteRibBic;

        return $this;
    }

    /**
     * Get compteRibBic
     *
     * @return string
     */
    public function getCompteRibBic()
    {
        return $this->compteRibBic;
    }

    /**
     * Set compteRibIban
     *
     * @param string $compteRibIban
     *
     * @return Comptes
     */
    public function setCompteRibIban($compteRibIban)
    {
        $this->compteRibIban = $compteRibIban;

        return $this;
    }

    /**
     * Get compteRibIban
     *
     * @return string
     */
    public function getCompteRibIban()
    {
        return $this->compteRibIban;
    }

    /**
     * Set compteMembre
     *
     * @param Membres $compteMembre
     *
     * @return Comptes
     */
    public function setCompteMembre($compteMembre)
    {
        $this->compteMembre = $compteMembre;

        return $this;
    }

    /**
     * Get compteMembre
     *
     * @return Membres
     */
    public function getCompteMembre()
    {
        return $this->compteMembre;
    }

    /**
     * Set compteNom
     *
     * @param string $compteNom
     *
     * @return Comptes
     */
    public function setCompteNom($compteNom)
    {
        $this->compteNom = $compteNom;

        return $this;
    }

    /**
     * Get compteNom
     *
     * @return string
     */
    public function getCompteNom()
    {
        return $this->compteNom;
    }

    /**
     * Set comptePrenom
     *
     * @param string $comptePrenom
     *
     * @return Comptes
     */
    public function setComptePrenom($comptePrenom)
    {
        $this->comptePrenom = $comptePrenom;

        return $this;
    }

    /**
     * Get comptePrenom
     *
     * @return string
     */
    public function getComptePrenom()
    {
        return $this->comptePrenom;
    }

    /**
     * Set compteAdresseL1
     *
     * @param string $compteAdresseL1
     *
     * @return Comptes
     */
    public function setCompteAdresseL1($compteAdresseL1)
    {
        $this->compteAdresseL1 = $compteAdresseL1;

        return $this;
    }

    /**
     * Get compteAdresseL1
     *
     * @return string
     */
    public function getCompteAdresseL1()
    {
        return $this->compteAdresseL1;
    }

    /**
     * Set compteAdresseL2
     *
     * @param string $compteAdresseL2
     *
     * @return Comptes
     */
    public function setCompteAdresseL2($compteAdresseL2)
    {
        $this->compteAdresseL2 = $compteAdresseL2;

        return $this;
    }

    /**
     * Get compteAdresseL2
     *
     * @return string
     */
    public function getCompteAdresseL2()
    {
        return $this->compteAdresseL2;
    }

    /**
     * Set compteCp
     *
     * @param string $compteCp
     *
     * @return Comptes
     */
    public function setCompteCp($compteCp)
    {
        $this->compteCp = $compteCp;

        return $this;
    }

    /**
     * Get compteCp
     *
     * @return string
     */
    public function getCompteCp()
    {
        return $this->compteCp;
    }

    /**
     * Set compteVille
     *
     * @param string $compteVille
     *
     * @return Comptes
     */
    public function setCompteVille($compteVille)
    {
        $this->compteVille = $compteVille;

        return $this;
    }

    /**
     * Get compteVille
     *
     * @return string
     */
    public function getCompteVille()
    {
        return $this->compteVille;
    }
}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * StatutJoueur
 *
 * @ORM\Table(name="statut_joueur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatutJoueurRepository")
 */
class StatutJoueur
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
     * @ORM\Column(name="statut_nom", type="string", length=255)
     */
    private $statutNom;


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
     * Set statutNom
     *
     * @param string $statutNom
     *
     * @return StatutJoueur
     */
    public function setStatutNom($statutNom)
    {
        $this->statutNom = $statutNom;

        return $this;
    }

    /**
     * Get statutNom
     *
     * @return string
     */
    public function getStatutNom()
    {
        return $this->statutNom;
    }
}


<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departements
 *
 * @ORM\Table(name="departements")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartementsRepository")
 */
class Departements
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
     * @ORM\Column(name="dpt_code", type="string", length=255)
     */
    private $dptCode;

    /**
     * @var string
     *
     * @ORM\Column(name="dpt_nom", type="string", length=255)
     * @Assert\NotNull()
     */
    private $dptNom;

    /*
    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Lieux", mappedBy="lieuDpt")
     *
     * @var Lieux[]
     */
    /*private $lieux;


    public function __construct()
    {
        $this->lieux = new ArrayCollection();
    }
*/
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
     * Set dptCode
     *
     * @param string $dptCode
     *
     * @return Departements
     */
    public function setDptCode($dptCode)
    {
        $this->dptCode = $dptCode;

        return $this;
    }

    /**
     * Get dptCode
     *
     * @return string
     */
    public function getDptCode()
    {
        return $this->dptCode;
    }

    /**
     * Set dptNom
     *
     * @param string $dptNom
     *
     * @return Departements
     */
    public function setDptNom($dptNom)
    {
        $this->dptNom = $dptNom;

        return $this;
    }

    /**
     * Get dptNom
     *
     * @return string
     */
    public function getDptNom()
    {
        return $this->dptNom;
    }

    /*public function setLieux($lieux)
    {
        $this->lieux = $lieux;

        return $this;
    }

    /**
     * Get dptNom
     *
     * @return string
     */
    /*public function getLieux()
    {
        return $this->lieux;
    }*/

}


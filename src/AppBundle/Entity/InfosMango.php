<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfosMango
 *
 * @ORM\Table(name="infos_mango")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InfosMangoRepository")
 */
class InfosMango
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
     * @ORM\Column(name="im_mango_id", type="string", length=255)
     */
    private $imMangoId;

    /**
     * @var Membres
     *
     * @ORM\ManyToOne(targetEntity="Membres", inversedBy="membreMango")
     */
    private $imMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="im_wallet_id", type="string", length=255)
     */
    private $imWalletId;


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
     * Set imMangoId
     *
     * @param string $imMangoId
     *
     * @return InfosMango
     */
    public function setImMangoId($imMangoId)
    {
        $this->imMangoId = $imMangoId;

        return $this;
    }

    /**
     * Get imMangoId
     *
     * @return string
     */
    public function getImMangoId()
    {
        return $this->imMangoId;
    }

    /**
     * Set imMembre
     *
     * @param Membres $imMembre
     *
     * @return InfosMango
     */
    public function setImMembre($imMembre)
    {
        $this->imMembre = $imMembre;

        return $this;
    }

    /**
     * Get imMembre
     *
     * @return Membres
     */
    public function getImMembre()
    {
        return $this->imMembre;
    }

    /**
     * Set imWalletId
     *
     * @param string $imWalletId
     *
     * @return InfosMango
     */
    public function setImWalletId($imWalletId)
    {
        $this->imWalletId = $imWalletId;

        return $this;
    }

    /**
     * Get imWalletId
     *
     * @return string
     */
    public function getImWalletId()
    {
        return $this->imWalletId;
    }
}


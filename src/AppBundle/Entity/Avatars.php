<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Avatars
 *
 * @ORM\Table(name="avatars")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvatarsRepository")
 */
class Avatars
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
     * @ORM\Column(name="avatar_url", type="string", length=255)
     */
    private $avatarUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="avatar_statut", type="integer")
     */
    private $avatarStatut;


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
     * Set avatarUrl
     *
     * @param string $avatarUrl
     *
     * @return Avatars
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * Get avatarUrl
     *
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
 * Set avatarStatut
 *
 * @param integer $avatarStatut
 *
 * @return Avatars
 */
    public function setAvatarStatut($avatarStatut)
    {
        $this->avatarStatut = $avatarStatut;

        return $this;
    }

    /**
     * Get avatarStatut
     *
     * @return int
     */
    public function getAvatarStatut()
    {
        return $this->avatarStatut;
    }
}


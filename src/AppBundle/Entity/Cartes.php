<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartes
 *
 * @ORM\Table(name="cartes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartesRepository")
 */
class Cartes {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Images", inversedBy="cartes", cascade={"persist", "remove"})
     */
    private $images;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Destinataire", mappedBy="carte" , cascade={"persist", "remove"})
     */
    private $destinataire;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="carte")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Cartes
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set images
     *
     * @param \AppBundle\Entity\Images $images
     * @return Cartes
     */
    public function setImages(\AppBundle\Entity\Images $images = null) {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \AppBundle\Entity\Images 
     */
    public function getImages() {
        return $this->images;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->destinataire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add destinataire
     *
     * @param \AppBundle\Entity\Destinataire $destinataire
     * @return Cartes
     */
    public function addDestinataire(\AppBundle\Entity\Destinataire $destinataire) {
        $this->destinataire[] = $destinataire;

        return $this;
    }

    /**
     * Remove destinataire
     *
     * @param \AppBundle\Entity\Destinataire $destinataire
     */
    public function removeDestinataire(\AppBundle\Entity\Destinataire $destinataire) {
        $this->destinataire->removeElement($destinataire);
    }

    /**
     * Get destinataire
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDestinataire() {
        return $this->destinataire;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Cartes
     */
    public function setUser(\AppBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

}

<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Cartes", mappedBy="user")
     * @ORM\JoinColumn(name="cartes_id", referencedColumnName="id")
     */
    private $carte;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Add carte
     *
     * @param \AppBundle\Entity\Cartes $carte
     * @return User
     */
    public function addCarte(\AppBundle\Entity\Cartes $carte) {
        $this->carte[] = $carte;

        return $this;
    }

    /**
     * Remove carte
     *
     * @param \AppBundle\Entity\Cartes $carte
     */
    public function removeCarte(\AppBundle\Entity\Cartes $carte) {
        $this->carte->removeElement($carte);
    }

    /**
     * Get carte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarte() {
        return $this->carte;
    }

}

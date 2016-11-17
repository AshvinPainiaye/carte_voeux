<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destinataire
 *
 * @ORM\Table(name="destinataire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DestinataireRepository")
 */
class Destinataire
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
     * @ORM\Column(name="mail_destinataire", type="string", length=255)
     */
    private $mailDestinataire;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cartes", inversedBy="destinataire", cascade={"persist", "remove"})
     */
    private $carte;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mailDestinataire
     *
     * @param string $mailDestinataire
     * @return Destinataire
     */
    public function setMailDestinataire($mailDestinataire)
    {
        $this->mailDestinataire = $mailDestinataire;

        return $this;
    }

    /**
     * Get mailDestinataire
     *
     * @return string 
     */
    public function getMailDestinataire()
    {
        return $this->mailDestinataire;
    }

    /**
     * Set carte
     *
     * @param \AppBundle\Entity\Cartes $carte
     * @return Destinataire
     */
    public function setCarte(\AppBundle\Entity\Cartes $carte = null)
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * Get carte
     *
     * @return \AppBundle\Entity\Cartes 
     */
    public function getCarte()
    {
        return $this->carte;
    }
}

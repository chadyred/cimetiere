<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\VilleRepository")
 */
class Ville {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomVille", type="string", length=50)
     */
    private $nomVille;

    /**
     * @ORM\OneToMany(targetEntity="Cimetiere\Bundle\Entity\Cimetiere", mappedBy="ville", cascade={"persist","remove"})
     */
    private $cimetieres;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomVille
     *
     * @param string $nomVille
     * @return Ville
     */
    public function setNomVille($nomVille) {
        $this->nomVille = $nomVille;

        return $this;
    }

    /**
     * Get nomVille
     *
     * @return string 
     */
    public function getNomVille() {
        return $this->nomVille;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->cimetieres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cimetieres
     *
     * @param \Cimetiere\Bundle\Entity\Cimetiere $cimetieres
     * @return Ville
     */
    public function addCimetiere(\Cimetiere\Bundle\Entity\Cimetiere $cimetieres) {
        $this->cimetieres[] = $cimetieres;

        return $this;
    }

    /**
     * Remove cimetieres
     *
     * @param \Cimetiere\Bundle\Entity\Cimetiere $cimetieres
     */
    public function removeCimetiere(\Cimetiere\Bundle\Entity\Cimetiere $cimetieres) {
        $this->cimetieres->removeElement($cimetieres);
    }

    /**
     * Get cimetieres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCimetieres() {
        return $this->cimetieres;
    }
    
    public function __toString() {
        return $this->nomVille;
    }

}


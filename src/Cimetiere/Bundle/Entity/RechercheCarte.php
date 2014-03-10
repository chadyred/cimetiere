<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RechercheCarte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\RechercheCarteRepository")
 */
class RechercheCarte
{
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
     * @ORM\Column(name="nomCimetiere", type="string", length=255)
     */
    private $nomCimetiere;


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
     * Set nomCimetiere
     *
     * @param string $nomCimetiere
     * @return RechercheCarte
     */
    public function setNomCimetiere($nomCimetiere)
    {
        $this->nomCimetiere = $nomCimetiere;

        return $this;
    }

    /**
     * Get nomCimetiere
     *
     * @return string 
     */
    public function getNomCimetiere()
    {
        return $this->nomCimetiere;
    }
}

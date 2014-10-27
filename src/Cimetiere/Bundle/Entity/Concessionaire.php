<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concessionaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\ConcessionaireRepository")
 */
class Concessionaire {

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
     * @ORM\Column(name="titre", type="string", length=20)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomPrenom", type="string", length=20)
     */
    private $nomPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nomJF", type="string", length=20)
     */
    private $nomJF;

    /**
     * @var integer
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=20)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse1", type="string", length=50)
     */
    private $adresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse2", type="string", length=50)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="codeGestionConcession", type="string", length=20)
     */
    private $codeGestionConcession;

    /**
     * @ORM\ManyToMany(targetEntity="Cimetiere\Bundle\Entity\Concession", inversedBy="concessionaires", cascade={"persist","remove"})
     */
    private $concessions;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Concessionaire
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set nomPrenom
     *
     * @param string $nomPrenom
     * @return Concessionaire
     */
    public function setNomPrenom($nomPrenom) {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    /**
     * Get nomPrenom
     *
     * @return string 
     */
    public function getNomPrenom() {
        return $this->nomPrenom;
    }

    /**
     * Set nomJF
     *
     * @param string $nomJF
     * @return Concessionaire
     */
    public function setNomJF($nomJF) {
        $this->nomJF = $nomJF;

        return $this;
    }

    /**
     * Get nomJF
     *
     * @return string 
     */
    public function getNomJF() {
        return $this->nomJF;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Concessionaire
     */
    public function setCp($cp) {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp() {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Concessionaire
     */
    public function setVille($ville) {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille() {
        return $this->ville;
    }

    /**
     * Set adresse1
     *
     * @param string $adresse1
     * @return Concessionaire
     */
    public function setAdresse1($adresse1) {
        $this->adresse1 = $adresse1;

        return $this;
    }

    /**
     * Get adresse1
     *
     * @return string 
     */
    public function getAdresse1() {
        return $this->adresse1;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return Concessionaire
     */
    public function setAdresse2($adresse2) {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2() {
        return $this->adresse2;
    }

    /**
     * Set codeGestionConcession
     *
     * @param string $codeGestionConcession
     * @return Concessionaire
     */
    public function setCodeGestionConcession($codeGestionConcession) {
        $this->codeGestionConcession = $codeGestionConcession;

        return $this;
    }

    /**
     * Get codeGestionConcession
     *
     * @return string 
     */
    public function getCodeGestionConcession() {
        return $this->codeGestionConcession;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->concessions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add concessions
     *
     * @param \Cimetiere\Bundle\Entity\Concession $concessions
     * @return Concessionaire
     */
    public function addConcession(\Cimetiere\Bundle\Entity\Concession $concessions) {
        $this->concessions[] = $concessions;

        return $this;
    }

    /**
     * Remove concessions
     *
     * @param \Cimetiere\Bundle\Entity\Concession $concessions
     */
    public function removeConcession(\Cimetiere\Bundle\Entity\Concession $concessions) {
        $this->concessions->removeElement($concessions);
    }

    /**
     * Get concessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcessions() {
        return $this->concessions;
    }

    public function __toString() {
        return $this->nomPrenom." ".$this->codeGestionConcession;
    }

}

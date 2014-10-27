<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * concession
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\ConcessionRepository")
 */
class Concession {

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
     * @ORM\Column(name="codeGestionConcession", type="string", length=20)
     */
    private $codeGestionConcession;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=2)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="typeConcession", type="string", length=1)
     */
    private $typeConcession;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPlaces", type="integer")
     */
    private $nbPlaces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEcheance", type="datetime")
     */
    private $dateEcheance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDerniereAcquisition", type="datetime")
     */
    private $dateDerniereAcquisition;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=2)
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroTitreConcession", type="integer")
     */
    private $numeroTitreConcession;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="coordX", type="integer")
     */
    private $coordX;

    /**
     * @var integer
     *
     * @ORM\Column(name="coordY", type="integer")
     */
    private $coordY;

    /**
     * @var string
     *
     * @ORM\Column(name="angle", type="string", length=5)
     */
    private $angle;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="hauteur", type="integer")
     */
    private $hauteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="largeur", type="integer")
     */
    private $largeur;

    /**
     * @ORM\ManyToOne(targetEntity="Cimetiere\Bundle\Entity\Cimetiere", inversedBy="concessions", cascade={"persist"})
     */
    private $cimetiere;

    /**
     * @ORM\ManyToMany(targetEntity="Cimetiere\Bundle\Entity\Concessionaire", cascade={"persist","remove"})
     */
    private $concessionaires;

    /**
     * @ORM\OneToMany(targetEntity="Cimetiere\Bundle\Entity\Defunt", mappedBy="concession", cascade={"persist","remove"})
     */
    private $defunts;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set codeGestionConcession
     *
     * @param string $codeGestionConcession
     * @return concession
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
     * Set nature
     *
     * @param string $nature
     * @return concession
     */
    public function setNature($nature) {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string 
     */
    public function getNature() {
        return $this->nature;
    }

    /**
     * Set typeConcession
     *
     * @param string $typeConcession
     * @return concession
     */
    public function setTypeConcession($typeConcession) {
        $this->typeConcession = $typeConcession;

        return $this;
    }

    /**
     * Get typeConcession
     *
     * @return string 
     */
    public function getTypeConcession() {
        return $this->typeConcession;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     * @return concession
     */
    public function setNbPlaces($nbPlaces) {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return integer 
     */
    public function getNbPlaces() {
        return $this->nbPlaces;
    }

    /**
     * Set dateEcheance
     *
     * @param \DateTime $dateEcheance
     * @return concession
     */
    public function setDateEcheance($dateEcheance) {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    /**
     * Get dateEcheance
     *
     * @return \DateTime 
     */
    public function getDateEcheance() {
        return $this->dateEcheance;
    }

    /**
     * Set dateDerniereAcquisition
     *
     * @param \DateTime $dateDerniereAcquisition
     * @return concession
     */
    public function setDateDerniereAcquisition($dateDerniereAcquisition) {
        $this->dateDerniereAcquisition = $dateDerniereAcquisition;

        return $this;
    }

    /**
     * Get dateDerniereAcquisition
     *
     * @return \DateTime 
     */
    public function getDateDerniereAcquisition() {
        return $this->dateDerniereAcquisition;
    }

    /**
     * Set duree
     *
     * @param string $duree
     * @return concession
     */
    public function setDuree($duree) {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string 
     */
    public function getDuree() {
        return $this->duree;
    }

    /**
     * Set numeroTitreConcession
     *
     * @param integer $numeroTitreConcession
     * @return concession
     */
    public function setNumeroTitreConcession($numeroTitreConcession) {
        $this->numeroTitreConcession = $numeroTitreConcession;

        return $this;
    }

    /**
     * Get numeroTitreConcession
     *
     * @return integer 
     */
    public function getNumeroTitreConcession() {
        return $this->numeroTitreConcession;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return concession
     */
    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire() {
        return $this->commentaire;
    }

    /**
     * Set coordX
     *
     * @param integer $coordX
     * @return concession
     */
    public function setCoordX($coordX) {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordX
     *
     * @return integer 
     */
    public function getCoordX() {
        return $this->coordX;
    }

    /**
     * Set coordY
     *
     * @param integer $coordY
     * @return concession
     */
    public function setCoordY($coordY) {
        $this->coordY = $coordY;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return integer 
     */
    public function getCoordY() {
        return $this->coordY;
    }

    /**
     * Set angle
     *
     * @param string $angle
     * @return concession
     */
    public function setAngle($angle) {
        $this->angle = $angle;

        return $this;
    }

    /**
     * Get angle
     *
     * @return string 
     */
    public function getAngle() {
        return $this->angle;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return concession
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return concession
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * Set hauteur
     *
     * @param integer $hauteur
     * @return concession
     */
    public function setHauteur($hauteur) {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get hauteur
     *
     * @return integer 
     */
    public function getHauteur() {
        return $this->hauteur;
    }

    /**
     * Set largeur
     *
     * @param integer $largeur
     * @return concession
     */
    public function setLargeur($largeur) {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return integer 
     */
    public function getLargeur() {
        return $this->largeur;
    }

    /**
     * Set cimetiere
     *
     * @param \Cimetiere\Bundle\Entity\Cimetiere $cimetiere
     * @return Concession
     */
    public function setCimetiere(\Cimetiere\Bundle\Entity\Cimetiere $cimetiere = null) {
        $this->cimetiere = $cimetiere;

        return $this;
    }

    /**
     * Get cimetiere
     *
     * @return \Cimetiere\Bundle\Entity\Cimetiere 
     */
    public function getCimetiere() {
        return $this->cimetiere;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->concessionaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->defunts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateDerniereAcquisition = new \DateTime();
        $this->dateEcheance = new \DateTime();
    }

    /**
     * Add concessionaires
     *
     * @param \Cimetiere\Bundle\Entity\Concessionaire $concessionaires
     * @return Concession
     */
    public function addConcessionaire(\Cimetiere\Bundle\Entity\Concessionaire $concessionaires) {
        $this->concessionaires[] = $concessionaires;

        return $this;
    }

    /**
     * Remove concessionaires
     *
     * @param \Cimetiere\Bundle\Entity\Concessionaire $concessionaires
     */
    public function removeConcessionaire(\Cimetiere\Bundle\Entity\Concessionaire $concessionaires) {
        $this->concessionaires->removeElement($concessionaires);
    }

    /**
     * Get concessionaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcessionaires() {
        return $this->concessionaires;
    }

    /**
     * Add defunts
     *
     * @param \Cimetiere\Bundle\Entity\Defunt $defunts
     * @return Concession
     */
    public function addDefunt(\Cimetiere\Bundle\Entity\Defunt $defunts) {
        $this->defunts[] = $defunts;

        return $this;
    }

    /**
     * Remove defunts
     *
     * @param \Cimetiere\Bundle\Entity\Defunt $defunts
     */
    public function removeDefunt(\Cimetiere\Bundle\Entity\Defunt $defunts) {
        $this->defunts->removeElement($defunts);
    }

    /**
     * Get defunts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDefunts() {
        return $this->defunts;
    }
    
     public function __toString() {
        return $this->codeGestionConcession." ".$this->numeroTitreConcession;
    }

}

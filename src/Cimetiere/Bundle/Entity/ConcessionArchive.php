<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConcessionArchive
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\ConcessionArchiveRepository")
 */
class ConcessionArchive
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
     * @ORM\Column(name="codeCimetiere", type="string", length=2)
     */
    private $codeCimetiere;

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
     * @var string
     *
     * @ORM\Column(name="numeroTitreConcession", type="string", length=7)
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
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;


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
     * Set codeCimetiere
     *
     * @param string $codeCimetiere
     * @return ConcessionArchive
     */
    public function setCodeCimetiere($codeCimetiere)
    {
        $this->codeCimetiere = $codeCimetiere;

        return $this;
    }

    /**
     * Get codeCimetiere
     *
     * @return string 
     */
    public function getCodeCimetiere()
    {
        return $this->codeCimetiere;
    }

    /**
     * Set codeGestionConcession
     *
     * @param string $codeGestionConcession
     * @return ConcessionArchive
     */
    public function setCodeGestionConcession($codeGestionConcession)
    {
        $this->codeGestionConcession = $codeGestionConcession;

        return $this;
    }

    /**
     * Get codeGestionConcession
     *
     * @return string 
     */
    public function getCodeGestionConcession()
    {
        return $this->codeGestionConcession;
    }

    /**
     * Set nature
     *
     * @param string $nature
     * @return ConcessionArchive
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set typeConcession
     *
     * @param string $typeConcession
     * @return ConcessionArchive
     */
    public function setTypeConcession($typeConcession)
    {
        $this->typeConcession = $typeConcession;

        return $this;
    }

    /**
     * Get typeConcession
     *
     * @return string 
     */
    public function getTypeConcession()
    {
        return $this->typeConcession;
    }

    /**
     * Set nbPlaces
     *
     * @param integer $nbPlaces
     * @return ConcessionArchive
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return integer 
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * Set dateEcheance
     *
     * @param \DateTime $dateEcheance
     * @return ConcessionArchive
     */
    public function setDateEcheance($dateEcheance)
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    /**
     * Get dateEcheance
     *
     * @return \DateTime 
     */
    public function getDateEcheance()
    {
        return $this->dateEcheance;
    }

    /**
     * Set dateDerniereAcquisition
     *
     * @param \DateTime $dateDerniereAcquisition
     * @return ConcessionArchive
     */
    public function setDateDerniereAcquisition($dateDerniereAcquisition)
    {
        $this->dateDerniereAcquisition = $dateDerniereAcquisition;

        return $this;
    }

    /**
     * Get dateDerniereAcquisition
     *
     * @return \DateTime 
     */
    public function getDateDerniereAcquisition()
    {
        return $this->dateDerniereAcquisition;
    }

    /**
     * Set duree
     *
     * @param string $duree
     * @return ConcessionArchive
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set numeroTitreConcession
     *
     * @param string $numeroTitreConcession
     * @return ConcessionArchive
     */
    public function setNumeroTitreConcession($numeroTitreConcession)
    {
        $this->numeroTitreConcession = $numeroTitreConcession;

        return $this;
    }

    /**
     * Get numeroTitreConcession
     *
     * @return string 
     */
    public function getNumeroTitreConcession()
    {
        return $this->numeroTitreConcession;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return ConcessionArchive
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set coordX
     *
     * @param integer $coordX
     * @return ConcessionArchive
     */
    public function setCoordX($coordX)
    {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordX
     *
     * @return integer 
     */
    public function getCoordX()
    {
        return $this->coordX;
    }

    /**
     * Set coordY
     *
     * @param integer $coordY
     * @return ConcessionArchive
     */
    public function setCoordY($coordY)
    {
        $this->coordY = $coordY;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return integer 
     */
    public function getCoordY()
    {
        return $this->coordY;
    }

    /**
     * Set angle
     *
     * @param string $angle
     * @return ConcessionArchive
     */
    public function setAngle($angle)
    {
        $this->angle = $angle;

        return $this;
    }

    /**
     * Get angle
     *
     * @return string 
     */
    public function getAngle()
    {
        return $this->angle;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return ConcessionArchive
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set hauteur
     *
     * @param integer $hauteur
     * @return ConcessionArchive
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get hauteur
     *
     * @return integer 
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * Set largeur
     *
     * @param integer $largeur
     * @return ConcessionArchive
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return integer 
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return ConcessionArchive
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }
}

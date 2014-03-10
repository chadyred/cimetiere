<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defunt
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\DefuntArchiveRepository")
 */
class DefuntArchive
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
     * @ORM\Column(name="codeGestionConcession", type="string", length=20)
     */
    private $codeGestionConcession;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroOrdre", type="integer")
     */
    private $numeroOrdre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomPrenom", type="string", length=50)
     */
    private $nomPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nomJF", type="string", length=20)
     */
    private $nomJF;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuNaissance", type="string", length=50)
     */
    private $lieuNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeces", type="datetime")
     */
    private $dateDeces;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuDeces", type="string", length=50)
     */
    private $lieuDeces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHinumation", type="datetime")
     */
    private $dateHinumation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExumation", type="datetime")
     */
    private $dateExumation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReduction", type="datetime")
     */
    private $dateReduction;

    /**
     * @var string
     *
     * @ORM\Column(name="enveloppeFuneraire", type="string", length=20)
     */
    private $enveloppeFuneraire;

    /**
     * @var string
     *
     * @ORM\Column(name="entrepriseFuneraire", type="string", length=50)
     */
    private $entrepriseFuneraire;

    /**
     * @var string
     *
     * @ORM\Column(name="marbrier", type="string", length=50)
     */
    private $marbrier;

    /**
     * @var string
     *
     * @ORM\Column(name="oppositionCremation", type="string", length=25)
     */
    private $oppositionCremation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;


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
     * Set codeGestionConcession
     *
     * @param string $codeGestionConcession
     * @return Defunt
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
     * Set numeroOrdre
     *
     * @param integer $numeroOrdre
     * @return Defunt
     */
    public function setNumeroOrdre($numeroOrdre)
    {
        $this->numeroOrdre = $numeroOrdre;

        return $this;
    }

    /**
     * Get numeroOrdre
     *
     * @return integer 
     */
    public function getNumeroOrdre()
    {
        return $this->numeroOrdre;
    }

    /**
     * Set nomPrenom
     *
     * @param string $nomPrenom
     * @return Defunt
     */
    public function setNomPrenom($nomPrenom)
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    /**
     * Get nomPrenom
     *
     * @return string 
     */
    public function getNomPrenom()
    {
        return $this->nomPrenom;
    }

    /**
     * Set nomJF
     *
     * @param string $nomJF
     * @return Defunt
     */
    public function setNomJF($nomJF)
    {
        $this->nomJF = $nomJF;

        return $this;
    }

    /**
     * Get nomJF
     *
     * @return string 
     */
    public function getNomJF()
    {
        return $this->nomJF;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Defunt
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return Defunt
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance
     *
     * @return string 
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set dateDeces
     *
     * @param \DateTime $dateDeces
     * @return Defunt
     */
    public function setDateDeces($dateDeces)
    {
        $this->dateDeces = $dateDeces;

        return $this;
    }

    /**
     * Get dateDeces
     *
     * @return \DateTime 
     */
    public function getDateDeces()
    {
        return $this->dateDeces;
    }

    /**
     * Set lieuDeces
     *
     * @param string $lieuDeces
     * @return Defunt
     */
    public function setLieuDeces($lieuDeces)
    {
        $this->lieuDeces = $lieuDeces;

        return $this;
    }

    /**
     * Get lieuDeces
     *
     * @return string 
     */
    public function getLieuDeces()
    {
        return $this->lieuDeces;
    }

    /**
     * Set dateHinumation
     *
     * @param \DateTime $dateHinumation
     * @return Defunt
     */
    public function setDateHinumation($dateHinumation)
    {
        $this->dateHinumation = $dateHinumation;

        return $this;
    }

    /**
     * Get dateHinumation
     *
     * @return \DateTime 
     */
    public function getDateHinumation()
    {
        return $this->dateHinumation;
    }

    /**
     * Set dateExumation
     *
     * @param \DateTime $dateExumation
     * @return Defunt
     */
    public function setDateExumation($dateExumation)
    {
        $this->dateExumation = $dateExumation;

        return $this;
    }

    /**
     * Get dateExumation
     *
     * @return \DateTime 
     */
    public function getDateExumation()
    {
        return $this->dateExumation;
    }

    /**
     * Set dateReduction
     *
     * @param \DateTime $dateReduction
     * @return Defunt
     */
    public function setDateReduction($dateReduction)
    {
        $this->dateReduction = $dateReduction;

        return $this;
    }

    /**
     * Get dateReduction
     *
     * @return \DateTime 
     */
    public function getDateReduction()
    {
        return $this->dateReduction;
    }

    /**
     * Set enveloppeFuneraire
     *
     * @param string $enveloppeFuneraire
     * @return Defunt
     */
    public function setEnveloppeFuneraire($enveloppeFuneraire)
    {
        $this->enveloppeFuneraire = $enveloppeFuneraire;

        return $this;
    }

    /**
     * Get enveloppeFuneraire
     *
     * @return string 
     */
    public function getEnveloppeFuneraire()
    {
        return $this->enveloppeFuneraire;
    }

    /**
     * Set entrepriseFuneraire
     *
     * @param string $entrepriseFuneraire
     * @return Defunt
     */
    public function setEntrepriseFuneraire($entrepriseFuneraire)
    {
        $this->entrepriseFuneraire = $entrepriseFuneraire;

        return $this;
    }

    /**
     * Get entrepriseFuneraire
     *
     * @return string 
     */
    public function getEntrepriseFuneraire()
    {
        return $this->entrepriseFuneraire;
    }

    /**
     * Set marbrier
     *
     * @param string $marbrier
     * @return Defunt
     */
    public function setMarbrier($marbrier)
    {
        $this->marbrier = $marbrier;

        return $this;
    }

    /**
     * Get marbrier
     *
     * @return string 
     */
    public function getMarbrier()
    {
        return $this->marbrier;
    }

    /**
     * Set oppositionCremation
     *
     * @param string $oppositionCremation
     * @return Defunt
     */
    public function setOppositionCremation($oppositionCremation)
    {
        $this->oppositionCremation = $oppositionCremation;

        return $this;
    }

    /**
     * Get oppositionCremation
     *
     * @return string 
     */
    public function getOppositionCremation()
    {
        return $this->oppositionCremation;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Defunt
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
}

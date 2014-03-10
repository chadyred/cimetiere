<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * concessionaireArchive
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\ConcessionaireArchiveRepository")
 */
class ConcessionaireArchive
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return concessionaireArchive
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nomPrenom
     *
     * @param string $nomPrenom
     * @return concessionaireArchive
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
     * @return concessionaireArchive
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
     * Set cp
     *
     * @param integer $cp
     * @return concessionaireArchive
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return concessionaireArchive
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adresse1
     *
     * @param string $adresse1
     * @return concessionaireArchive
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    /**
     * Get adresse1
     *
     * @return string 
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return concessionaireArchive
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * Set codeGestionConcession
     *
     * @param string $codeGestionConcession
     * @return concessionaireArchive
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
}

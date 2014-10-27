<?php

namespace Cimetiere\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueNumeroTitreConcession
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cimetiere\Bundle\Entity\HistoriqueNumeroTitreConcessionRepository")
 */
class HistoriqueNumeroTitreConcession
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
     * @ORM\Column(name="ancienNumeroTitreConcession", type="integer")
     */
    private $ancienNumeroTitreConcession;


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
     * @return HistoriqueNumeroTitreConcession
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
     * Set ancienNumeroTitreConcession
     *
     * @param integer $ancienNumeroTitreConcession
     * @return HistoriqueNumeroTitreConcession
     */
    public function setAncienNumeroTitreConcession($ancienNumeroTitreConcession)
    {
        $this->ancienNumeroTitreConcession = $ancienNumeroTitreConcession;

        return $this;
    }

    /**
     * Get ancienNumeroTitreConcession
     *
     * @return integer 
     */
    public function getAncienNumeroTitreConcession()
    {
        return $this->ancienNumeroTitreConcession;
    }
}

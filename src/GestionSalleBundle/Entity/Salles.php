<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salles
 *
 * @ORM\Table(name="salles")
 * @ORM\Entity
 */
class Salles
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_pc", type="integer", nullable=true)
     */
    private $nbPc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tableau", type="boolean", nullable=true)
     */
    private $tableau;

    /**
     * @var boolean
     *
     * @ORM\Column(name="projecteur", type="boolean", nullable=true)
     */
    private $projecteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Salles
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbPc
     *
     * @param integer $nbPc
     *
     * @return Salles
     */
    public function setNbPc($nbPc)
    {
        $this->nbPc = $nbPc;

        return $this;
    }

    /**
     * Get nbPc
     *
     * @return integer
     */
    public function getNbPc()
    {
        return $this->nbPc;
    }

    /**
     * Set tableau
     *
     * @param boolean $tableau
     *
     * @return Salles
     */
    public function setTableau($tableau)
    {
        $this->tableau = $tableau;

        return $this;
    }

    /**
     * Get tableau
     *
     * @return boolean
     */
    public function getTableau()
    {
        return $this->tableau;
    }

    /**
     * Set projecteur
     *
     * @param boolean $projecteur
     *
     * @return Salles
     */
    public function setProjecteur($projecteur)
    {
        $this->projecteur = $projecteur;

        return $this;
    }

    /**
     * Get projecteur
     *
     * @return boolean
     */
    public function getProjecteur()
    {
        return $this->projecteur;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

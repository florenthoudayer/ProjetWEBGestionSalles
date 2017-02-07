<?php

namespace gestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="FK_utilisateur_id_formation", columns={"id_formation"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="autorisation", type="string", length=25, nullable=true)
     */
    private $autorisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var \gestionBundle\Entity\Formation
     *
     * @ORM\ManyToOne(targetEntity="gestionBundle\Entity\Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formation", referencedColumnName="id_formation")
     * })
     */
    private $idFormation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="gestionBundle\Entity\Matiere", mappedBy="idUtilisateur")
     */
    private $idMatiere;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idMatiere = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set autorisation
     *
     * @param string $autorisation
     *
     * @return Utilisateur
     */
    public function setAutorisation($autorisation)
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    /**
     * Get autorisation
     *
     * @return string
     */
    public function getAutorisation()
    {
        return $this->autorisation;
    }

    /**
     * Get idUtilisateur
     *
     * @return integer
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set idFormation
     *
     * @param \gestionBundle\Entity\Formation $idFormation
     *
     * @return Utilisateur
     */
    public function setIdFormation(\gestionBundle\Entity\Formation $idFormation = null)
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    /**
     * Get idFormation
     *
     * @return \gestionBundle\Entity\Formation
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Add idMatiere
     *
     * @param \gestionBundle\Entity\Matiere $idMatiere
     *
     * @return Utilisateur
     */
    public function addIdMatiere(\gestionBundle\Entity\Matiere $idMatiere)
    {
        $this->idMatiere[] = $idMatiere;

        return $this;
    }

    /**
     * Remove idMatiere
     *
     * @param \gestionBundle\Entity\Matiere $idMatiere
     */
    public function removeIdMatiere(\gestionBundle\Entity\Matiere $idMatiere)
    {
        $this->idMatiere->removeElement($idMatiere);
    }

    /**
     * Get idMatiere
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    public function __toString()
    {
        $nomPrenom = $this->nom.' '.$this->prenom;
        return $nomPrenom;
    }
}

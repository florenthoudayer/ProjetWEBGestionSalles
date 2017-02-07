<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="FK_utilisateur_id_formation", columns={"id_formation"}), @ORM\Index(name="FK_utilisateur_id_titre", columns={"id_titre"})})
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
     * @ORM\Column(name="mdp", type="string", length=25, nullable=true)
     */
    private $mdp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \GestionSalleBundle\Entity\Formation
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formation", referencedColumnName="id")
     * })
     */
    private $idFormation;

    /**
     * @var \GestionSalleBundle\Entity\Titre
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\Titre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_titre", referencedColumnName="id")
     * })
     */
    private $idTitre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="GestionSalleBundle\Entity\Matiere", mappedBy="idUtilisateur")
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
     * Set mdp
     *
     * @param string $mdp
     *
     * @return Utilisateur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     *
     * @return Utilisateur
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
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

    /**
     * Set idFormation
     *
     * @param \GestionSalleBundle\Entity\Formation $idFormation
     *
     * @return Utilisateur
     */
    public function setIdFormation(\GestionSalleBundle\Entity\Formation $idFormation = null)
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    /**
     * Get idFormation
     *
     * @return \GestionSalleBundle\Entity\Formation
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Set idTitre
     *
     * @param \GestionSalleBundle\Entity\Titre $idTitre
     *
     * @return Utilisateur
     */
    public function setIdTitre(\GestionSalleBundle\Entity\Titre $idTitre = null)
    {
        $this->idTitre = $idTitre;

        return $this;
    }

    /**
     * Get idTitre
     *
     * @return \GestionSalleBundle\Entity\Titre
     */
    public function getIdTitre()
    {
        return $this->idTitre;
    }

    /**
     * Add idMatiere
     *
     * @param \GestionSalleBundle\Entity\Matiere $idMatiere
     *
     * @return Utilisateur
     */
    public function addIdMatiere(\GestionSalleBundle\Entity\Matiere $idMatiere)
    {
        $this->idMatiere[] = $idMatiere;

        return $this;
    }

    /**
     * Remove idMatiere
     *
     * @param \GestionSalleBundle\Entity\Matiere $idMatiere
     */
    public function removeIdMatiere(\GestionSalleBundle\Entity\Matiere $idMatiere)
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
}

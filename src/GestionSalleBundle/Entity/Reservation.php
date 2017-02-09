<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_reservation_id_salles", columns={"id_salles"}), @ORM\Index(name="FK_reservation_id_formation", columns={"id_formation"}), @ORM\Index(name="FK_reservation_id_matiere", columns={"id_matiere"}), @ORM\Index(name="FK_reservation_id_utilisateur", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \GestionSalleBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \GestionSalleBundle\Entity\Salles
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\Salles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salles", referencedColumnName="id")
     * })
     */
    private $idSalles;

    /**
     * @var \GestionSalleBundle\Entity\Matiere
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matiere", referencedColumnName="id")
     * })
     */
    private $idMatiere;

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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Reservation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Reservation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
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
     * Set idUtilisateur
     *
     * @param \GestionSalleBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Reservation
     */
    public function setIdUtilisateur(\GestionSalleBundle\Entity\Utilisateur $idUtilisateur = null)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return \GestionSalleBundle\Entity\Utilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set idSalles
     *
     * @param \GestionSalleBundle\Entity\Salles $idSalles
     *
     * @return Reservation
     */
    public function setIdSalles(\GestionSalleBundle\Entity\Salles $idSalles = null)
    {
        $this->idSalles = $idSalles;

        return $this;
    }

    /**
     * Get idSalles
     *
     * @return \GestionSalleBundle\Entity\Salles
     */
    public function getIdSalles()
    {
        return $this->idSalles;
    }

    /**
     * Set idMatiere
     *
     * @param \GestionSalleBundle\Entity\Matiere $idMatiere
     *
     * @return Reservation
     */
    public function setIdMatiere(\GestionSalleBundle\Entity\Matiere $idMatiere = null)
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    /**
     * Get idMatiere
     *
     * @return \GestionSalleBundle\Entity\Matiere
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Set idFormation
     *
     * @param \GestionSalleBundle\Entity\Formation $idFormation
     *
     * @return Reservation
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
    
    
}

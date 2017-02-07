<?php

namespace gestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_reservation_id_salle", columns={"id_salle"}), @ORM\Index(name="FK_reservation_id_formation", columns={"id_formation"}), @ORM\Index(name="FK_reservation_id_matiere", columns={"id_matiere"}), @ORM\Index(name="FK_reservation_id_utilisateur", columns={"id_utilisateur"})})
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
     * @ORM\Column(name="id_reservation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var \gestionBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="gestionBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \gestionBundle\Entity\Salles
     *
     * @ORM\ManyToOne(targetEntity="gestionBundle\Entity\Salles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_salle", referencedColumnName="id_salle")
     * })
     */
    private $idSalle;

    /**
     * @var \gestionBundle\Entity\Matiere
     *
     * @ORM\ManyToOne(targetEntity="gestionBundle\Entity\Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matiere", referencedColumnName="id_matiere")
     * })
     */
    private $idMatiere;

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
     * Get idReservation
     *
     * @return integer
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set idUtilisateur
     *
     * @param \gestionBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Reservation
     */
    public function setIdUtilisateur(\gestionBundle\Entity\Utilisateur $idUtilisateur = null)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return \gestionBundle\Entity\Utilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set idSalle
     *
     * @param \gestionBundle\Entity\Salles $idSalle
     *
     * @return Reservation
     */
    public function setIdSalle(\gestionBundle\Entity\Salles $idSalle = null)
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    /**
     * Get idSalle
     *
     * @return \gestionBundle\Entity\Salles
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * Set idMatiere
     *
     * @param \gestionBundle\Entity\Matiere $idMatiere
     *
     * @return Reservation
     */
    public function setIdMatiere(\gestionBundle\Entity\Matiere $idMatiere = null)
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    /**
     * Get idMatiere
     *
     * @return \gestionBundle\Entity\Matiere
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Set idFormation
     *
     * @param \gestionBundle\Entity\Formation $idFormation
     *
     * @return Reservation
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
}

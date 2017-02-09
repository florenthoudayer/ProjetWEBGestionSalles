<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_reservation_id_salles", columns={"id_salles"}), @ORM\Index(name="FK_reservation_id_formation", columns={"id_formation"}), @ORM\Index(name="FK_reservation_id_matiere", columns={"id_matiere"}), @ORM\Index(name="FK_reservation_id_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="GestionSalleBundle\Repository\ReservationRepository")
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
     * @var \GestionSalleBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="GestionSalleBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

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
     * Set idUser
     *
     * @param \GestionSalleBundle\Entity\User $idUser
     *
     * @return Reservation
     */
    public function setIdUser(\GestionSalleBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \GestionSalleBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
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
    
    public function __toString()
    {
        $nomDate = $this->dateDebut;
        return $nomDate;
    }
    
    
}

<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=25, nullable=true)
     */
    private $matiere;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="GestionSalleBundle\Entity\Utilisateur", inversedBy="idMatiere")
     * @ORM\JoinTable(name="forme",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_matiere", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     *   }
     * )
     */
    private $idUtilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Matiere
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
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
     * Add idUtilisateur
     *
     * @param \GestionSalleBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Matiere
     */
    public function addIdUtilisateur(\GestionSalleBundle\Entity\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur[] = $idUtilisateur;

        return $this;
    }

    /**
     * Remove idUtilisateur
     *
     * @param \GestionSalleBundle\Entity\Utilisateur $idUtilisateur
     */
    public function removeIdUtilisateur(\GestionSalleBundle\Entity\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur->removeElement($idUtilisateur);
    }

    /**
     * Get idUtilisateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}

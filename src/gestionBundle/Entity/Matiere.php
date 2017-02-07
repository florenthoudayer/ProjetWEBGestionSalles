<?php

namespace gestionBundle\Entity;

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
     * @ORM\Column(name="intitule", type="string", length=25, nullable=true)
     */
    private $intitule;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_matiere", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatiere;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="gestionBundle\Entity\Utilisateur", inversedBy="idMatiere")
     * @ORM\JoinTable(name="possede",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_matiere", referencedColumnName="id_matiere")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
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
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Matiere
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Get idMatiere
     *
     * @return integer
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Add idUtilisateur
     *
     * @param \gestionBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Matiere
     */
    public function addIdUtilisateur(\gestionBundle\Entity\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur[] = $idUtilisateur;

        return $this;
    }

    /**
     * Remove idUtilisateur
     *
     * @param \gestionBundle\Entity\Utilisateur $idUtilisateur
     */
    public function removeIdUtilisateur(\gestionBundle\Entity\Utilisateur $idUtilisateur)
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

    public function __toString()
    {
        return $this->intitule;
    }
}

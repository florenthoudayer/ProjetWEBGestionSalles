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
     * @ORM\ManyToMany(targetEntity="GestionSalleBundle\Entity\User", inversedBy="idMatiere")
     * @ORM\JoinTable(name="forme",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_matiere", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     *   }
     * )
     */
    private $idUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add idUser
     *
     * @param \GestionSalleBundle\Entity\User $idUtilisateur
     *
     * @return Matiere
     */
    public function addIdUser(\GestionSalleBundle\Entity\User $idUser)
    {
        $this->idUser[] = $idUser;

        return $this;
    }

    /**
     * Remove idser
     *
     * @param \GestionSalleBundle\Entity\User $idUtilisateur
     */
    public function removeIdUser(\GestionSalleBundle\Entity\User $idUser)
    {
        $this->idUser->removeElement($idUser);
    }

    /**
     * Get idUtilisateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
    
    public function __toString()
    {
        $nommatiere = $this->matiere;
        return $nommatiere;
    }
}

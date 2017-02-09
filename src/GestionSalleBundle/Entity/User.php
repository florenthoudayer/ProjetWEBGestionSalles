<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * user
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="FK_utilisateur_id_formation", columns={"id_formation"}), @ORM\Index(name="FK_utilisateur_id_titre", columns={"id_titre"})}))
 * @ORM\Entity(repositoryClass="GestionSalleBundle\Repository\userRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

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
     * @ORM\ManyToMany(targetEntity="GestionSalleBundle\Entity\Matiere", mappedBy="idUser")
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return user
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
     * @return user
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
     * Set username
     *
     * @param string $username
     *
     * @return user
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return user
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return test
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {

    }

    /**
     * Set idFormation
     *
     * @param \GestionSalleBundle\Entity\Formation $idFormation
     *
     * @return User
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
     * @return User
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
     * @return User
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
    
    public function __toString()
    {
        $nomprenom = $this->nom.' '.$this->prenom;
        return $nomprenom;
    }
}

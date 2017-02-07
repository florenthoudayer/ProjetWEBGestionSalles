<?php

namespace GestionSalleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titre
 *
 * @ORM\Table(name="titre")
 * @ORM\Entity
 */
class Titre
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=25, nullable=true)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
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

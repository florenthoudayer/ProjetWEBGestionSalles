<?php

namespace gestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_formation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFormation;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Formation
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
     * Get idFormation
     *
     * @return integer
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    public function __toString()
    {
        return $this->nom;
    }
}

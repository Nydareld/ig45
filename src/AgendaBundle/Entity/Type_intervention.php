<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type_intervention
 *
 * @ORM\Table(name="type_intervention")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\type_interventionRepository")
 */
class Type_intervention
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
     * @var Evenement
     *
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="type")
     */
    private $evenements;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return type_intervention
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
}

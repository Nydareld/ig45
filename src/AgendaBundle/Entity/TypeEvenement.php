<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type_evenement
 *
 * @ORM\Table(name="type_evenement")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\type_evenementRepository")
 */
class TypeEvenement
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
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="typeEvenement", cascade={"persist"})
     */
    private $evenements;

    /**
     * @var Niveau
     *
     * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Niveau", inversedBy="typeEvenements")
     */
    private $niveaux;

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
     * @return type_evenement
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

    public function __toString(){
      return $this->nom;
    }

}

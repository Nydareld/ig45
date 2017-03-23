<?php

namespace AgendaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 *
 * @ORM\Table(name="niveau")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\NiveauRepository")
 */
class Niveau
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var Etablissement
     *
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Etablissement", inversedBy="niveaux")
     * @ORM\JoinTable(name="etablissement_niveau")
     */
    private $etablissements;

    /**
     * @var Type_evenement
     *
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\TypeEvenement", mappedBy="niveaux")
     */
    private $type_evenements;


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
     * Set description
     *
     * @param string $description
     *
     * @return Niveau
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}

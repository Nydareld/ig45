<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


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

    public function __toString(){
      return $this->nom;
    }

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
     * Get the value of Nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of Nom
     *
     * @param string nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of Evenements
     *
     * @return Evenement
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * Set the value of Evenements
     *
     * @param Evenement evenements
     *
     * @return self
     */
    public function setEvenements(ArrayCollection $evenements)
    {
        $this->evenements = $evenements;

        return $this;
    }

    /**
     * Get the value of Niveaux
     *
     * @return Niveau
     */
    public function getNiveaux()
    {
        return $this->niveaux;
    }

    /**
     * Set the value of Niveaux
     *
     * @param Niveau niveaux
     *
     * @return self
     */
    public function setNiveaux(ArrayCollection $niveaux)
    {
        $this->niveaux = $niveaux;

        return $this;
    }

}

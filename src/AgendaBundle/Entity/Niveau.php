<?php

namespace AgendaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(name="nom", type="text", nullable=true)
     */
    private $nom;

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
    private $typeEvenements;


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
     * Get the value of Etablissements
     *
     * @return Etablissement
     */
    public function getEtablissements()
    {
        return $this->etablissements;
    }

    /**
     * Set the value of Etablissements
     *
     * @param Etablissement etablissements
     *
     * @return self
     */
    public function setEtablissements(ArrayCollection $etablissements)
    {
        $this->etablissements = $etablissements;

        return $this;
    }

    /**
     * Get the value of Type Evenements
     *
     * @return Type_evenement
     */
    public function getTypeEvenements()
    {
        return $this->typeEvenements;
    }

    /**
     * Set the value of Type Evenements
     *
     * @param Type_evenement typeEvenements
     *
     * @return self
     */
    public function setTypeEvenements(ArrayCollection $typeEvenements)
    {
        $this->typeEvenements = $typeEvenements;

        return $this;
    }

}

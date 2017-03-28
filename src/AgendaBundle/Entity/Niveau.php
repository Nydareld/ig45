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
     * @ORM\Column(name="nom", type="string", nullable=true)
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
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\TypeEvenement", mappedBy="niveaux")
     * @ORM\JoinTable(name="type_evenement_niveaux",
     *      joinColumns={@ORM\JoinColumn(name="type_evenement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="niveau_id", referencedColumnName="id")}
     * )
     */
    private $typeEvenements;

    public function __toString(){
        return $this->getNom();
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

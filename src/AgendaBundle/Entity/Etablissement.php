<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="correspondances")
     */
    private $correspondants;

    /**
     * @var User
     *
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="adjonctions")
     * @ORM\JoinTable(name="etablissement_adjoints",
     *      joinColumns={@ORM\JoinColumn(name="etablissement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    private $adjoints;

    /**
     * @var Evenement
     *
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="etablissement")
     */
    private $evenements;

    /**
     * @var Niveau
     *
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Niveau", mappedBy="etablissements")
     * @ORM\JoinTable(name="etablissement_niveau",
     *     joinColumns={@ORM\JoinColumn(name="id_etablissement", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_niveau", referencedColumnName="id")}
     *     )
     */
    private $niveaux;

    /**
     * @var string
     *
     * @ORM\Column(name="Presence", type="string", length=3, nullable=true)
     */
    private $presence;

    /**
     * Constructor
     */
    public function __construct(){
        $this->adjoints = new \Doctrine\Common\Collections\ArrayCollection();
        $this->evenements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return $this->nom;
    }

    /**
     * Get the value of Id
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
     * Get the value of Adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of Adresse
     *
     * @param string adresse
     *
     * @return self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of Ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of Ville
     *
     * @param string ville
     *
     * @return self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of Code Postal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of Code Postal
     *
     * @param integer codePostal
     *
     * @return self
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get the value of Correspondants
     *
     * @return User
     */
    public function getCorrespondants()
    {
        return $this->correspondants;
    }

    /**
     * Set the value of Correspondants
     *
     * @param User correspondants
     *
     * @return self
     */
    public function setCorrespondants(User $correspondants)
    {
        $this->correspondants = $correspondants;

        return $this;
    }

    /**
     * Get the value of Adjoints
     *
     * @return User
     */
    public function getAdjoints()
    {
        return $this->adjoints;
    }

    /**
     * Set the value of Adjoints
     *
     * @param User adjoints
     *
     * @return self
     */
    public function setAdjoints(User $adjoints)
    {
        $this->adjoints = $adjoints;

        return $this;
    }

    /**
     * Add adjoint
     *
     * @param \UserBundle\Entity\User $adjoint
     *
     * @return Etablissement
     */
    public function addAdjoint(\UserBundle\Entity\User $adjoint)
    {
    $this->adjoints->add($adjoint);

    return $this;
    }



    /**
     * Remove adjoint
     *
     * @param \UserBundle\Entity\User $adjoint
     */
    public function removeAdjoint(\UserBundle\Entity\User $adjoint)
    {
    $this->adjoints->removeElement($adjoint);

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
     * Add evenement
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     *
     * @return Etablissement
     */
    public function addEvenement(\AgendaBundle\Entity\Evenement $evenement)
    {
        $this->evenements->add($evenement);

        return $this;
    }


    /**
     * Remove evenement
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     */
    public function removeEvenement(\AgendaBundle\Entity\Evenement $evenement)
    {
        $this->evenements->removeElement($evenement);

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
    public function setNiveaux(Niveau $niveaux)
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    public function getPresence()
    {
        return $this -> presence;
    }

    public function setPresence($presence)
    {
        $this -> presence = $presence;

        return $this;
    }

}

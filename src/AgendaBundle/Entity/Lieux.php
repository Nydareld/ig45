<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Lieux
 *
 * @ORM\Table(name="lieux")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\LieuxRepository")
 */
class Lieux
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="correspondants_lieux")
     */
     private $correspondants;

     /**
      * @var User
      *
      * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="adjoint_lieux")
      * @ORM\JoinTable(name="lieux_adjoints",
      *      joinColumns={@ORM\JoinColumn(name="lieux_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
      * )
      */
      private $adjoints;

      /**
      * @var Type_lieu
      *
      * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Type_lieu", inversedBy="lieux")
      */
      private $type;

      /**
       * @var Evenement
       *
       * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="lieu")
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
     * @return Lieux
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

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Lieux
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return Lieux
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal.
     *
     * @param string $codePostal
     *
     * @return Lieux
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal.
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adjoints = new \Doctrine\Common\Collections\ArrayCollection();
        $this->evenements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set correspondants
     *
     * @param \UserBundle\Entity\User $correspondants
     *
     * @return Lieux
     */
    public function setCorrespondants(\UserBundle\Entity\User $correspondants = null)
    {
        $this->correspondants = $correspondants;

        return $this;
    }

    /**
     * Get correspondants
     *
     * @return \UserBundle\Entity\User
     */
    public function getCorrespondants()
    {
        return $this->correspondants;
    }

    /**
     * Add adjoint
     *
     * @param \UserBundle\Entity\User $adjoint
     *
     * @return Lieux
     */
    public function addAdjoint(\UserBundle\Entity\User $adjoint)
    {
        $this->adjoints[] = $adjoint;

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
    }

    /**
     * Get adjoints
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdjoints()
    {
        return $this->adjoints;
    }

    /**
     * Set type
     *
     * @param \AgendaBundle\Entity\Type_lieu $type
     *
     * @return Lieux
     */
    public function setType(\AgendaBundle\Entity\Type_lieu $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AgendaBundle\Entity\Type_lieu
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add evenement
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     *
     * @return Lieux
     */
    public function addEvenement(\AgendaBundle\Entity\Evenement $evenement)
    {
        $this->evenements[] = $evenement;

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
    }

    /**
     * Get evenements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    public function __toString(){
      return $this->nom;
    }
}

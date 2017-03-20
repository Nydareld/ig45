<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * Get the value of Type
     *
     * @return Type_lieu
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of Type
     *
     * @param Type_lieu type
     *
     * @return self
     */
    public function setType(Type_lieu $type)
    {
        $this->type = $type;

        return $this;
    }

}

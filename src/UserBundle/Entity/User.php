<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string")
     */
    protected $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
    * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="intervenants")
    */
    protected $interventions;

    /**
    * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="observateurs")
    */
    protected $observations;

    /**
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Lieux", mappedBy="correspondants")
     */
    protected $correspondants_lieux;

    /**
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Lieux", mappedBy="adjoints")
     * @ORM\JoinTable(name="fos_user_user_adjoints",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lieux_id", referencedColumnName="id")}
     * )
     */
    protected $adjoint_lieux;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Nom
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of Nom
     *
     * @param mixed nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     *
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @param mixed prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    /**
     * Add intervention.
     *
     * @param \AgendaBundle\Entity\Evenement $intervention
     *
     * @return User
     */
    public function addIntervention(\AgendaBundle\Entity\Evenement $intervention)
    {
        $this->intervention[] = $intervention;

        return $this;
    }

    /**
     * Remove intervention.
     *
     * @param \AgendaBundle\Entity\Evenement $intervention
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIntervention(\AgendaBundle\Entity\Evenement $intervention)
    {
        return $this->intervention->removeElement($intervention);
    }

    /**
     * Get intervention.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Add observation.
     *
     * @param \AgendaBundle\Entity\Evenement $observation
     *
     * @return User
     */
    public function addObservation(\AgendaBundle\Entity\Evenement $observation)
    {
        $this->observation[] = $observation;

        return $this;
    }

    /**
     * Remove observation.
     *
     * @param \AgendaBundle\Entity\Evenement $observation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservation(\AgendaBundle\Entity\Evenement $observation)
    {
        return $this->observation->removeElement($observation);
    }

    /**
     * Get observation.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Add evenement.
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     *
     * @return User
     */
    public function addEvenement(\AgendaBundle\Entity\Evenement $evenement)
    {
        $this->evenements[] = $evenement;

        return $this;
    }

    /**
     * Remove evenement.
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeEvenement(\AgendaBundle\Entity\Evenement $evenement)
    {
        return $this->evenements->removeElement($evenement);
    }

    /**
     * Get evenements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvenements()
    {
        return $this->evenements;
    }
}

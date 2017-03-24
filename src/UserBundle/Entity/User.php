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
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Evenement", inversedBy="intervenants")
     * @ORM\JoinTable(name="user_interventions")
     */
    protected $interventions;

    /**
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Evenement", inversedBy="observateurs")
     * @ORM\JoinTable(name="user_observations")
     */
    protected $observations;

    /**
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Etablissement", mappedBy="correspondants")
     */
    protected $correspondances;

    /**
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Etablissement", inversedBy="adjoints")
     * @ORM\JoinTable(name="etablissement_adjoints")
     */
    protected $adjonctions;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_fixe", type="integer", nullable=true)
     */
    private $telFixe;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_port", type="integer", nullable=true)
     */
    private $telPortable;

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
     * @param \AgendaBundle\Entity\Evenement $interventions
     *
     * @return User
     */
    public function addIntervention(\AgendaBundle\Entity\Evenement $intervention)
    {
        $this->interventions[] = $intervention;

        return $this;
    }

    /**
     * Remove intervention.
     *
     * @param \AgendaBundle\Entity\Evenement $interventions
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIntervention(\AgendaBundle\Entity\Evenement $intervention)
    {
        return $this->interventions->removeElement($intervention);
    }

    /**
     * Get intervention.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    /**
     * Add observation.
     *
     * @param \AgendaBundle\Entity\Evenement $observations
     *
     * @return User
     */
    public function addObservation(\AgendaBundle\Entity\Evenement $observation)
    {
        $this->observations[] = $observation;

        return $this;
    }

    /**
     * Remove observation.
     *
     * @param \AgendaBundle\Entity\Evenement $observations
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservation(\AgendaBundle\Entity\Evenement $observation)
    {
        return $this->observations->removeElement($observation);
    }

    /**
     * Get observation.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservations()
    {
        return $this->observations;
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


    /**
     * Set telFixe.
     *
     * @param int $telFixe
     *
     * @return User
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * Get telFixe.
     *
     * @return int
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set telPort.
     *
     * @param int $telPort
     *
     * @return User
     */
    public function setTelPortable($telPort)
    {
        $this->telPortable = $telPortable;

        return $this;
    }

    /**
     * Get telPort.
     *
     * @return int
     */
    public function getTelPortable()
    {
        return $this->telPortable;
    }

    /**
     * Add correspondantsLieux.
     *
     * @param \AgendaBundle\Entity\Etablissement $correspondantsLieux
     *
     * @return User
     */
    public function addCorrespondantsLieux(\AgendaBundle\Entity\Etablissement $correspondantsLieux)
    {
        $this->correspondants_lieux[] = $correspondantsLieux;

        return $this;
    }

    /**
     * Remove correspondantsLieux.
     *
     * @param \AgendaBundle\Entity\Etablissement $correspondantsLieux
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCorrespondantsLieux(\AgendaBundle\Entity\Etablissement $correspondantsLieux)
    {
        return $this->correspondants_lieux->removeElement($correspondantsLieux);
    }

    /**
     * Get correspondantsLieux.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorrespondantsLieux()
    {
        return $this->correspondants_lieux;
    }

    /**
     * Add adjointLieux.
     *
     * @param \AgendaBundle\Entity\Etablissement $adjointLieux
     *
     * @return User
     */
    public function addAdjointLieux(\AgendaBundle\Entity\Etablissement $adjointLieux)
    {
        $this->adjoint_lieux[] = $adjointLieux;

        return $this;
    }

    /**
     * Remove adjointLieux.
     *
     * @param \AgendaBundle\Entity\Etablissement $adjointLieux
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAdjointLieux(\AgendaBundle\Entity\Etablissement $adjointLieux)
    {
        return $this->adjoint_lieux->removeElement($adjointLieux);
    }

    /**
     * Get adjointLieux.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdjointLieux()
    {
        return $this->adjoint_lieux;
    }

    /**
     * Representation en chaine d'un utilisateur : Prenom Nom
     * @method __toString
     * @return string
     */
    public function __toString(){
        return $this->getNom().' '.$this->getPrenom();
    }


    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Groups
     *
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set the value of Groups
     *
     * @param mixed groups
     *
     * @return self
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * Set the value of Interventions
     *
     * @param mixed interventions
     *
     * @return self
     */
    public function setInterventions($interventions)
    {
        $this->interventions = $interventions;

        return $this;
    }

    /**
     * Set the value of Observations
     *
     * @param mixed observations
     *
     * @return self
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get the value of Correspondances
     *
     * @return mixed
     */
    public function getCorrespondances()
    {
        return $this->correspondances;
    }

    /**
     * Set the value of Correspondances
     *
     * @param mixed correspondances
     *
     * @return self
     */
    public function setCorrespondances($correspondances)
    {
        $this->correspondances = $correspondances;

        return $this;
    }

    /**
     * Get the value of Adjonctions
     *
     * @return mixed
     */
    public function getAdjonctions()
    {
        return $this->adjonctions;
    }

    /**
     * Set the value of Adjonctions
     *
     * @param mixed adjonctions
     *
     * @return self
     */
    public function setAdjonctions($adjonctions)
    {
        $this->adjonctions = $adjonctions;

        return $this;
    }

}

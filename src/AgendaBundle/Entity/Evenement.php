<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_evt", type="datetime")
     */
    private $dateEvt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_debut", type="datetime")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_fin", type="datetime")
     */
    private $heureFin;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participants", type="integer")
     */
    private $nbParticipants;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_observateurs", type="integer")
     */
    private $nbObservateurs;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_intervention", type="string", length=255)
     */
    private $niveauIntervention;

    /**
     * @var string
     *
     * @ORM\Column(name="type_intervention", type="string", length=255)
     */
    private $typeIntervention;

    /**
     * @var correspondant
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="evenements")
     */
     private $correspondant;

     /**
      * @var Lieux
      *
      * @ORM\OneToOne(targetEntity="AgendaBundle\Entity\Lieux")
      */
     private $lieu;

     /**
      * @var status
      *
      * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Status")
      * @ORM\JoinTable(name="evt_status",
      *      joinColumns={@ORM\JoinColumn(name="evt_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="status_id", referencedColumnName="id")}
      * )
      */

      private $status;

      /**
      * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="intervention")
      * @ORM\JoinTable(name="intervention",
      *      joinColumns={@ORM\JoinColumn(name="evt_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
      * )
      */
      private $intervenants;

      /**
       * @var boolean
       *
       * @ORM\Column(name="have_observateur", type="boolean")
       */
      private $have_observateur;

      /**
      * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="observation")
      * @ORM\JoinTable(name="observation",
      *      joinColumns={@ORM\JoinColumn(name="evt_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
      * )
      */
      private $observateurs;

      /**
      * @var Type_intervention
      *
      * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Type_intervention", inversedBy="evenements")
      */
      private $type;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
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

    /**
     * Set dateEvt
     *
     * @param \DateTime $dateEvt
     *
     * @return Evenement
     */
    public function setDateEvt($dateEvt)
    {
        $this->dateEvt = $dateEvt;

        return $this;
    }

    /**
     * Get dateEvt
     *
     * @return \DateTime
     */
    public function getDateEvt()
    {
        return $this->dateEvt;
    }

    /**
     * Set heureDebut
     *
     * @param \DateTime $heureDebut
     *
     * @return Evenement
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return Evenement
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set nbParticipants
     *
     * @param integer $nbParticipants
     *
     * @return Evenement
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get nbParticipants
     *
     * @return int
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }

    /**
     * Set nbObservateurs
     *
     * @param integer $nbObservateurs
     *
     * @return Evenement
     */
    public function setNbObservateurs($nbObservateurs)
    {
        $this->nbObservateurs = $nbObservateurs;

        return $this;
    }

    /**
     * Get nbObservateurs
     *
     * @return int
     */
    public function getNbObservateurs()
    {
        return $this->nbObservateurs;
    }

    /**
     * Set niveauIntervention
     *
     * @param string $niveauIntervention
     *
     * @return Evenement
     */
    public function setNiveauIntervention($niveauIntervention)
    {
        $this->niveauIntervention = $niveauIntervention;

        return $this;
    }

    /**
     * Get niveauIntervention
     *
     * @return string
     */
    public function getNiveauIntervention()
    {
        return $this->niveauIntervention;
    }

    /**
     * Set typeIntervention
     *
     * @param string $typeIntervention
     *
     * @return Evenement
     */
    public function setTypeIntervention($typeIntervention)
    {
        $this->typeIntervention = $typeIntervention;

        return $this;
    }

    /**
     * Get typeIntervention
     *
     * @return string
     */
    public function getTypeIntervention()
    {
        return $this->typeIntervention;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
        $this->intervenants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Evenement
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
     * Set zipcode.
     *
     * @param int $zipcode
     *
     * @return Evenement
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode.
     *
     * @return int
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return Evenement
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
     * Set correspondant.
     *
     * @param \UserBundle\Entity\User|null $correspondant
     *
     * @return Evenement
     */
    public function setCorrespondant(\UserBundle\Entity\User $correspondant = null)
    {
        $this->correspondant = $correspondant;

        return $this;
    }

    /**
     * Get correspondant.
     *
     * @return \UserBundle\Entity\User|null
     */
    public function getCorrespondant()
    {
        return $this->correspondant;
    }

    /**
     * Add status.
     *
     * @param \AgendaBundle\Entity\Status $status
     *
     * @return Evenement
     */
    public function addStatus(\AgendaBundle\Entity\Status $status)
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * Remove status.
     *
     * @param \AgendaBundle\Entity\Status $status
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStatus(\AgendaBundle\Entity\Status $status)
    {
        return $this->status->removeElement($status);
    }

    /**
     * Get status.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add intervenant.
     *
     * @param \UserBundle\Entity\User $intervenant
     *
     * @return Evenement
     */
    public function addIntervenant(\UserBundle\Entity\User $intervenant)
    {
        $this->intervenants[] = $intervenant;

        return $this;
    }

    /**
     * Remove intervenant.
     *
     * @param \UserBundle\Entity\User $intervenant
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIntervenant(\UserBundle\Entity\User $intervenant)
    {
        return $this->intervenants->removeElement($intervenant);
    }

    /**
     * Get intervenants.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Add observateur.
     *
     * @param \UserBundle\Entity\User $observateur
     *
     * @return Evenement
     */
    public function addObservateur(\UserBundle\Entity\User $observateur)
    {
        $this->observateurs[] = $observateur;

        return $this;
    }

    /**
     * Remove observateur.
     *
     * @param \UserBundle\Entity\User $observateur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeObservateur(\UserBundle\Entity\User $observateur)
    {
        return $this->observateurs->removeElement($observateur);
    }

    /**
     * Get observateurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservateurs()
    {
        return $this->observateurs;
    }
}

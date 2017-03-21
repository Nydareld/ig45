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
     * @var Type_intervention
     *
     * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Type_intervention", cascade={"persist"})
     */
    private $typeIntervention;

     /**
      * @var Lieux
      *
      * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Lieux", inversedBy="evenements")
      */
     private $lieu;

     /**
      * @var status
      *
      * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Status")
      * @ORM\JoinTable(name="evt_status",
      *      joinColumns={@ORM\JoinColumn(name="evt_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="status_id", referencedColumnName="id")}
      * )
      */

      private $statut;

      /**
      * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="intervention")
      * @ORM\JoinTable(name="intervention",
      *      joinColumns={@ORM\JoinColumn(name="evt_id", referencedColumnName="id")},
      *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
      * )
      */
      private $intervenants;

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


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->intervenants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return integer
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
     * @return integer
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
     * Set lieu
     *
     * @param \AgendaBundle\Entity\Lieux $lieu
     *
     * @return Evenement
     */
    public function setLieu(\AgendaBundle\Entity\Lieux $lieu = null)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \AgendaBundle\Entity\Lieux
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set statut
     *
     * @param \AgendaBundle\Entity\Status $statut
     *
     * @return Evenement
     */
    public function setStatut(\AgendaBundle\Entity\Status $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \AgendaBundle\Entity\Status
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Add intervenant
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
     * Remove intervenant
     *
     * @param \UserBundle\Entity\User $intervenant
     */
    public function removeIntervenant(\UserBundle\Entity\User $intervenant)
    {
        $this->intervenants->removeElement($intervenant);
    }

    /**
     * Get intervenants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Add observateur
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
     * Remove observateur
     *
     * @param \UserBundle\Entity\User $observateur
     */
    public function removeObservateur(\UserBundle\Entity\User $observateur)
    {
        $this->observateurs->removeElement($observateur);
    }

    /**
     * Get observateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObservateurs()
    {
        return $this->observateurs;
    }
}

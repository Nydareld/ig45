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
     * @ORM\Column(name="description", type="text", nullable=true)
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
     * @var boolean
     *
     * @ORM\Column(name="annule", type="boolean")
     */
    private $annule = false;

    /**
     * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\TypeEvenement", inversedBy="evenements", cascade={"persist"})
     */
    private $typeEvenement;

    /**
     * @ORM\ManyToOne(targetEntity="AgendaBundle\Entity\Etablissement", inversedBy="evenements")
     */
    private $etablissement;

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="interventions")
     * @ORM\JoinTable(name="user_interventions",
     *      joinColumns={@ORM\JoinColumn(name="evenement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    private $intervenants;

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="observations")
     * @ORM\JoinTable(name="user_observations",
     *      joinColumns={@ORM\JoinColumn(name="evenement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    private $observateurs;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_groupes", type="integer", nullable=true)
     */
    private $nbGroupes;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_salles", type="integer", nullable=true)
     */
    private $nbSalles;

    /**
     * @var string
     *
     * @ORM\Column(name="eleves_volontaires", type="text", nullable=true)
     */
    private $eleves_volontaires;

    /**
     * @var boolean
     *
     * @ORM\Column(name="documentation_attendue", type="boolean", nullable=true)
     */
    private $documentation_attendue;

    /**
     * @var string
     *
     * @ORM\Column(name="particularite", type="text", nullable=true)
     */
    private $particularite;

    /**
     * @var string
     *
     * @ORM\Column(name="complement_info", type="text", nullable=true)
     */
    private $complement_info;

    /**
     * @var string
     *
     * @ORM\Column(name="enseignant_ref", type="text", nullable=true)
     */
    private $enseignant_ref;

    /**
     * @var string
     *
     * @ORM\Column(name="courriel_enseignant_ref", type="text", nullable=true)
     */
    private $courriel_enseignant_ref;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_enseignant_ref", type="integer", nullable=true)
     */
    private $tel_enseignant_ref;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_eleves", type="integer", nullable=true)
     */
    private $nbEleves;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_classe", type="text", nullable=true)
     */
    private $niveau_classe;


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
     * Set Type_evenement
     *
     * @param string $typeEvenement
     *
     * @return Evenement
     */
    public function setTypeEvenement($typeEvenement)
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    /**
     * Get typeEvenement
     *
     * @return string
     */
    public function getTypeEvenement()
    {
        return $this->typeEvenement;
    }

    /**
     * Set etablissement
     *
     * @param \AgendaBundle\Entity\Etablissement $lieu
     *
     * @return Evenement
     */
    public function setLieu(\AgendaBundle\Entity\Etablissement $lieu = null)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \AgendaBundle\Entity\Etablissement
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

    /**
     * Set finaleIntervention.
     *
     * @param string $finaleIntervention
     *
     * @return Evenement
     */
    public function setFinaleIntervention($finaleIntervention)
    {
        $this->finale_intervention = $finaleIntervention;

        return $this;
    }

    /**
     * Get finaleIntervention.
     *
     * @return string
     */
    public function getFinaleIntervention()
    {
        return $this->finale_intervention;
    }

    /**
     * Set nbGroupes.
     *
     * @param int $nbGroupes
     *
     * @return Evenement
     */
    public function setNbGroupes($nbGroupes)
    {
        $this->nbGroupes = $nbGroupes;

        return $this;
    }

    /**
     * Get nbGroupes.
     *
     * @return int
     */
    public function getNbGroupes()
    {
        return $this->nbGroupes;
    }

    /**
     * Set nbSalles.
     *
     * @param int $nbSalles
     *
     * @return Evenement
     */
    public function setNbSalles($nbSalles)
    {
        $this->nbSalles = $nbSalles;

        return $this;
    }

    /**
     * Get nbSalles.
     *
     * @return int
     */
    public function getNbSalles()
    {
        return $this->nbSalles;
    }

    /**
     * Set elevesVolontaires.
     *
     * @param string $elevesVolontaires
     *
     * @return Evenement
     */
    public function setElevesVolontaires($elevesVolontaires)
    {
        $this->eleves_volontaires = $elevesVolontaires;

        return $this;
    }

    /**
     * Get elevesVolontaires.
     *
     * @return string
     */
    public function getElevesVolontaires()
    {
        return $this->eleves_volontaires;
    }

    /**
     * Set documentationAttendue.
     *
     * @param bool $documentationAttendue
     *
     * @return Evenement
     */
    public function setDocumentationAttendue($documentationAttendue)
    {
        $this->documentation_attendue = $documentationAttendue;

        return $this;
    }

    /**
     * Get documentationAttendue.
     *
     * @return bool
     */
    public function getDocumentationAttendue()
    {
        return $this->documentation_attendue;
    }

    /**
     * Set particularite.
     *
     * @param string $particularite
     *
     * @return Evenement
     */
    public function setParticularite($particularite)
    {
        $this->particularite = $particularite;

        return $this;
    }

    /**
     * Get particularite.
     *
     * @return string
     */
    public function getParticularite()
    {
        return $this->particularite;
    }

    /**
     * Set complementInfo.
     *
     * @param string $complementInfo
     *
     * @return Evenement
     */
    public function setComplementInfo($complementInfo)
    {
        $this->complement_info = $complementInfo;

        return $this;
    }

    /**
     * Get complementInfo.
     *
     * @return string
     */
    public function getComplementInfo()
    {
        return $this->complement_info;
    }

    /**
     * Set enseignantRef.
     *
     * @param string $enseignantRef
     *
     * @return Evenement
     */
    public function setEnseignantRef($enseignantRef)
    {
        $this->enseignant_ref = $enseignantRef;

        return $this;
    }

    /**
     * Get enseignantRef.
     *
     * @return string
     */
    public function getEnseignantRef()
    {
        return $this->enseignant_ref;
    }

    /**
     * Set courrielEnseignantRef.
     *
     * @param string $courrielEnseignantRef
     *
     * @return Evenement
     */
    public function setCourrielEnseignantRef($courrielEnseignantRef)
    {
        $this->courriel_enseignant_ref = $courrielEnseignantRef;

        return $this;
    }

    /**
     * Get courrielEnseignantRef.
     *
     * @return string
     */
    public function getCourrielEnseignantRef()
    {
        return $this->courriel_enseignant_ref;
    }

    /**
     * Set telEnseignantRef.
     *
     * @param int $telEnseignantRef
     *
     * @return Evenement
     */
    public function setTelEnseignantRef($telEnseignantRef)
    {
        $this->tel_enseignant_ref = $telEnseignantRef;

        return $this;
    }

    /**
     * Get telEnseignantRef.
     *
     * @return int
     */
    public function getTelEnseignantRef()
    {
        return $this->tel_enseignant_ref;
    }

    /**
     * Set nbEleves.
     *
     * @param int $nbEleves
     *
     * @return Evenement
     */
    public function setNbEleves($nbEleves)
    {
        $this->nbEleves = $nbEleves;

        return $this;
    }

    /**
     * Get nbEleves.
     *
     * @return int
     */
    public function getNbEleves()
    {
        return $this->nbEleves;
    }

    /**
     * Set niveauClasse.
     *
     * @param string $niveauClasse
     *
     * @return Evenement
     */
    public function setNiveauClasse($niveauClasse)
    {
        $this->niveau_classe = $niveauClasse;

        return $this;
    }

    /**
     * Get niveauClasse.
     *
     * @return string
     */
    public function getNiveauClasse()
    {
        return $this->niveau_classe;
    }
}

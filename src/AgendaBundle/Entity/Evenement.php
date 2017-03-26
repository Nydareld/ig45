<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var string
     *
     * @ORM\Column(name="niveau_intervention", type="string")
     */
    private $niveauIntervention;

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
    private $elevesVolontaires;

    /**
     * @var boolean
     *
     * @ORM\Column(name="documentation_attendue", type="boolean", nullable=true)
     */
    private $documentationAttendue;

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
    private $complementInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="enseignant_ref", type="text", nullable=true)
     */
    private $enseignantRef;

    /**
     * @var string
     *
     * @ORM\Column(name="courriel_enseignant_ref", type="text", nullable=true)
     */
    private $courrielEnseignantRef;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_enseignant_ref", type="integer", nullable=true)
     */
    private $telEnseignantRef;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_eleves", type="integer", nullable=true)
     */
    private $nbEleves;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->intervenants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->observateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param string description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Date Evt
     *
     * @return \DateTime
     */
    public function getDateEvt()
    {
        return $this->dateEvt;
    }

    /**
     * Set the value of Date Evt
     *
     * @param \DateTime dateEvt
     *
     * @return self
     */
    public function setDateEvt(\DateTime $dateEvt)
    {
        $this->dateEvt = $dateEvt;

        return $this;
    }

    /**
     * Get the value of Heure Debut
     *
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set the value of Heure Debut
     *
     * @param \DateTime heureDebut
     *
     * @return self
     */
    public function setHeureDebut(\DateTime $heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get the value of Heure Fin
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set the value of Heure Fin
     *
     * @param \DateTime heureFin
     *
     * @return self
     */
    public function setHeureFin(\DateTime $heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get the value of Nb Participants
     *
     * @return int
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }

    /**
     * Set the value of Nb Participants
     *
     * @param int nbParticipants
     *
     * @return self
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get the value of Nb Observateurs
     *
     * @return int
     */
    public function getNbObservateurs()
    {
        return $this->nbObservateurs;
    }

    /**
     * Set the value of Nb Observateurs
     *
     * @param int nbObservateurs
     *
     * @return self
     */
    public function setNbObservateurs($nbObservateurs)
    {
        $this->nbObservateurs = $nbObservateurs;

        return $this;
    }

    /**
     * Get the value of Annule
     *
     * @return boolean
     */
    public function getAnnule()
    {
        return $this->annule;
    }

    /**
     * Set the value of Annule
     *
     * @param boolean annule
     *
     * @return self
     */
    public function setAnnule($annule)
    {
        $this->annule = $annule;

        return $this;
    }

    /**
     * Get the value of Type Evenement
     *
     * @return mixed
     */
    public function getTypeEvenement()
    {
        return $this->typeEvenement;
    }

    /**
     * Set the value of Type Evenement
     *
     * @param mixed typeEvenement
     *
     * @return self
     */
    public function setTypeEvenement($typeEvenement)
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    /**
     * Get the value of Etablissement
     *
     * @return mixed
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set the value of Etablissement
     *
     * @param mixed etablissement
     *
     * @return self
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get the value of Intervenants
     *
     * @return mixed
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Set the value of Intervenants
     *
     * @param mixed intervenants
     *
     * @return self
     */
    public function setIntervenants($intervenants)
    {
        $this->intervenants = $intervenants;

        return $this;
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
        $this->intervenants->add( $intervenant);

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
     * Get the value of Observateurs
     *
     * @return mixed
     */
    public function getObservateurs()
    {
        return $this->observateurs;
    }

    /**
     * Set the value of Observateurs
     *
     * @param mixed observateurs
     *
     * @return self
     */
    public function setObservateurs($observateurs)
    {
        $this->observateurs = $observateurs;

        return $this;
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
        $this->observateurs->add( $observateur);

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
     * Get the value of Nb Groupes
     *
     * @return int
     */
    public function getNbGroupes()
    {
        return $this->nbGroupes;
    }

    /**
     * Set the value of Nb Groupes
     *
     * @param int nbGroupes
     *
     * @return self
     */
    public function setNbGroupes($nbGroupes)
    {
        $this->nbGroupes = $nbGroupes;

        return $this;
    }

    /**
     * Get the value of Nb Salles
     *
     * @return int
     */
    public function getNbSalles()
    {
        return $this->nbSalles;
    }

    /**
     * Set the value of Nb Salles
     *
     * @param int nbSalles
     *
     * @return self
     */
    public function setNbSalles($nbSalles)
    {
        $this->nbSalles = $nbSalles;

        return $this;
    }

    /**
     * Get the value of Eleves Volontaires
     *
     * @return string
     */
    public function getElevesVolontaires()
    {
        return $this->elevesVolontaires;
    }

    /**
     * Set the value of Eleves Volontaires
     *
     * @param string elevesVolontaires
     *
     * @return self
     */
    public function setElevesVolontaires($elevesVolontaires)
    {
        $this->elevesVolontaires = $elevesVolontaires;

        return $this;
    }

    /**
     * Get the value of Documentation Attendue
     *
     * @return boolean
     */
    public function getDocumentationAttendue()
    {
        return $this->documentationAttendue;
    }

    /**
     * Set the value of Documentation Attendue
     *
     * @param boolean documentationAttendue
     *
     * @return self
     */
    public function setDocumentationAttendue($documentationAttendue)
    {
        $this->documentationAttendue = $documentationAttendue;

        return $this;
    }

    /**
     * Get the value of Particularite
     *
     * @return string
     */
    public function getParticularite()
    {
        return $this->particularite;
    }

    /**
     * Set the value of Particularite
     *
     * @param string particularite
     *
     * @return self
     */
    public function setParticularite($particularite)
    {
        $this->particularite = $particularite;

        return $this;
    }

    /**
     * Get the value of Complement Info
     *
     * @return string
     */
    public function getComplementInfo()
    {
        return $this->complementInfo;
    }

    /**
     * Set the value of Complement Info
     *
     * @param string complementInfo
     *
     * @return self
     */
    public function setComplementInfo($complementInfo)
    {
        $this->complementInfo = $complementInfo;

        return $this;
    }

    /**
     * Get the value of Enseignant Ref
     *
     * @return string
     */
    public function getEnseignantRef()
    {
        return $this->enseignantRef;
    }

    /**
     * Set the value of Enseignant Ref
     *
     * @param string enseignantRef
     *
     * @return self
     */
    public function setEnseignantRef($enseignantRef)
    {
        $this->enseignantRef = $enseignantRef;

        return $this;
    }

    /**
     * Get the value of Courriel Enseignant Ref
     *
     * @return string
     */
    public function getCourrielEnseignantRef()
    {
        return $this->courrielEnseignantRef;
    }

    /**
     * Set the value of Courriel Enseignant Ref
     *
     * @param string courrielEnseignantRef
     *
     * @return self
     */
    public function setCourrielEnseignantRef($courrielEnseignantRef)
    {
        $this->courrielEnseignantRef = $courrielEnseignantRef;

        return $this;
    }

    /**
     * Get the value of Tel Enseignant Ref
     *
     * @return int
     */
    public function getTelEnseignantRef()
    {
        return $this->telEnseignantRef;
    }

    /**
     * Set the value of Tel Enseignant Ref
     *
     * @param int telEnseignantRef
     *
     * @return self
     */
    public function setTelEnseignantRef($telEnseignantRef)
    {
        $this->telEnseignantRef = $telEnseignantRef;

        return $this;
    }

    /**
     * Get the value of Nb Eleves
     *
     * @return int
     */
    public function getNbEleves()
    {
        return $this->nbEleves;
    }

    /**
     * Set the value of Nb Eleves
     *
     * @param int nbEleves
     *
     * @return self
     */
    public function setNbEleves($nbEleves)
    {
        $this->nbEleves = $nbEleves;

        return $this;
    }


    /**
     * Set niveauIntervention.
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
     * Get niveauIntervention.
     *
     * @return string
     */
    public function getNiveauIntervention()
    {
        return $this->niveauIntervention;
    }
}

<?php
namespace UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AgendaBundle\Entity\Evenement;
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
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Etablissement", mappedBy="correspondant")
     */
    protected $correspondances;
    /**
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Etablissement", mappedBy="adjoints")
     */
    protected $adjonctions;
    /**
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", nullable=true)
     */
    private $telFixe;
    /**
     * @var string
     *
     * @ORM\Column(name="tel_port", type="string", nullable=true)
     */
    private $telPortable;
    public function __construct()
    {
        parent::__construct();
        $this->groups = new ArrayCollection();
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
     * Get the value of Tel Fixe
     *
     * @return int
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }
    /**
     * Set the value of Tel Fixe
     *
     * @param int telFixe
     *
     * @return self
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;
        return $this;
    }
    /**
     * Get the value of Tel Portable
     *
     * @return int
     */
    public function getTelPortable()
    {
        return $this->telPortable;
    }
    /**
     * Set the value of Tel Portable
     *
     * @param int telPortable
     *
     * @return self
     */
    public function setTelPortable($telPortable)
    {
        $this->telPortable = $telPortable;
        return $this;
    }
    /**
     * Get the value of Interventions
     *
     * @return mixed
     */
    public function getInterventions()
    {
        return $this->interventions;
    }
    /**
     * Set the value of Interventions
     *
     * @param  AgendaBundle\Entity\Evenement $intervention l'intervention a ajouter
     *
     * @return self
     */
    public function setInterventions($interventions)
    {
        $this->interventions = $interventions;
        return $this;
    }
    /**
     * @method addInterventions
     * @param  AgendaBundle\Entity\Evenement $intervention l'intervention a ajouter
     * @return self
     */
    public function addInterventions(Evenement $intervention)
    {
        $this->interventions->add($intervention);
        return $this;
    }
    /**
     * @method removeInterventions
     * @param  AgendaBundleEntityEvenement $intervention [description]
     * @return self
     */
    public function removeInterventions(Evenement $intervention)
    {
        $this->interventions->removeElement($intervention);
        return $this;
    }
    /**
     * Get the value of Observations
     *
     * @return mixed
     */
    public function getObservations()
    {
        return $this->observations;
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
     * @method addObervations
     * @param  AgendaBundleEntityEvenement $observation [description]
     * @return self
     */
    public function addObervations(Evenement $observation)
    {
        $this->observations->add($observation);
        return $this;
    }
    /**
     * @method removeObervations
     * @param  AgendaBundleEntityEvenement $observation [description]
     * @return self
     */
    public function removeObervations(Evenement $observation)
    {
        $this->observations->removeElement($observation);
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
     * @method addCorrespondances
     * @param  AgendaBundleEntityEvenement $correspondances [description]
     * @return self
     */
    public function addCorrespondances(Evenement $correspondances)
    {
        $this->correspondances->add($correspondances);
        return $this;
    }
    /**
     * @method removeCorrespondances
     * @param  AgendaBundleEntityEvenement $correspondances [description]
     * @return self
     */
    public function removeCorrespondances(Evenement $correspondances)
    {
        $this->correspondances->removeElement($correspondances);
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
    /**
     * @method addAdjonctions
     * @param  AgendaBundleEntityEvenement $adjonctions [description]
     * @return self
     */
    public function addAdjonctions(Evenement $adjonctions)
    {
        $this->adjonctions->add($adjonctions);
        return $this;
    }
    /**
     * @method removeAdjonctions
     * @param  AgendaBundleEntityEvenement $adjonctions [description]
     * @return self
     */
    public function removeAdjonctions(Evenement $adjonctions)
    {
        $this->adjonctions->removeElement($adjonctions);
        return $this;
    }
}
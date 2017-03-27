<?php
/**
 * Created by PhpStorm.
 * User: Damie
 * Date: 27/03/2017
 * Time: 14:56
 */

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnneeScolaire
 *
 * @ORM\Table(name="annee_scolaire")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\AnneeScolaireRepository")
 */
class AnneeScolaire
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
    private $annee;

    /**
     * @var Evenement
     *
     * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Evenement", mappedBy="anneeScolaire")
     */
    private $evenements;

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
     * Get the value of Annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of Annee
     *
     * @param string annee
     *
     * @return self
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->evenements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add evenement.
     *
     * @param \AgendaBundle\Entity\Evenement $evenement
     *
     * @return AnneeScolaire
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

<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * type_lieu
 *
 * @ORM\Table(name="type_lieu")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\type_lieuRepository")
 */
class Type_lieu
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
    * @var Evenement
    *
    * @ORM\OneToMany(targetEntity="AgendaBundle\Entity\Lieux", mappedBy="type")
    */
    private $lieux;

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
     * @return type_lieu
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

    public function __toString(){
      return $this->nom;
    }
}

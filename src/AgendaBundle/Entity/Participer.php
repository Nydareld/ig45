<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="participer")
 * @ORM\Entity(repositoryClass="AgendaBundle\Repository\ParticiperRepository")
 */
class Participer
{
  /**
   * @var int
   * @ORM\Column(name="id_evt", type="integer")
   * @ORM\Id
   * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Evenement")
   */

   private $id_evt;

   /**
    * @var int
    * @ORM\Column(name="id_user", type="integer")
    * @ORM\Id
    * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User")
    */

    private $id_user;

    /**
     * @var int
     * @ORM\Column(name="id_type", type="integer")
     * @ORM\Id
     * @ORM\ManyToMany(targetEntity="AgendaBundle\Entity\Type")
     */

     private $id_type;

}

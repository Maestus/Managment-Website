<?php

namespace OC\UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Table(name="Salarie")
 *@ORM\Entity
 */
class Salarie
{
  /**
   * @ORM\Column(name="nom", type="text")
   * @ORM\Nom
   */
    protected $nom;

    /**
     * @ORM\Column(name="prenom", type="text")
     * @ORM\Prenom
     */
    protected $prenom;

    /**
     * @var \DateTime
     */
    protected $datenaissance;

    /**
     * @var string
     */
    protected $sexe;

    /**
     * @var \DateTime
     */
    protected $dateentre;

    /**
     * @var string
     */
    protected $typecontrat;

    /**
     * @var integer
     */
    protected $dureecontrat;

    /**
     * @var integer
     */
    protected $salaire;

    /**
     * @var integer
     */
    protected $superieurhierarchique;

    /**
     * @var integer
     */
    protected $id;

}

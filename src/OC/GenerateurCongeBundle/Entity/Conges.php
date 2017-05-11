<?php
namespace OC\GenerateurCongeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="conges")
 */
class Conges
{
	 /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	 /**
     * @ORM\Column(type="integer")
     */
    private $id_salarie;


	 /**
     * @ORM\Column(type="string",length=11)
     */
    private $debut;


	 /**
     * @ORM\Column(type="integer",length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $fin;


	 /**
     * @ORM\Column(type="boolean")
     */
    private $valide;


	 /**
     * @ORM\Column(type="integer")
     */
    private $jours_restants;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

  public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set idSalarie
     *
     * @param integer $idSalarie
     *
     * @return CongesBase
     */
    public function setId_Salarie($idSalarie)
    {
        $this->id_salarie = $idSalarie;

        return $this;
    }



    /**
     * Get idSalarie
     *
     * @return integer
     */
    public function getId_Salarie()
    {
        return $this->id_salarie;
    }

    /**
     * Set debut
     *
     * @param string $debut
     *
     * @return CongesBase
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return string
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param integer $fin
     *
     * @return CongesBase
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return integer
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return CongesBase
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set joursRestants
     *
     * @param integer $joursRestants
     *
     * @return CongesBase
     */
    public function setJours_Restants($joursRestants)
    {
        $this->jours_restants = $joursRestants;

        return $this;
    }

    /**
     * Get joursRestants
     *
     * @return integer
     */
    public function getJours_Restants()
    {
        return $this->jours_restants;
    }
}

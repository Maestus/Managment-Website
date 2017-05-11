<?php
namespace OC\GenerateurCongeBundle\Entity;

class Form
{
    protected $debut;
    protected $fin;
    protected $salarie;
    protected $valide;
    protected $annuler;


    public function getDebut()
    {
        return $this->debut;
    }

    public function setDebut($debut)
    {
        $this->debut = $debut;
    }

    public function getFin()
    {
        return $this->fin;
    }

    public function setFin($fin)
    {
        $this->fin = $fin;
    }
	
    public function getSalarie()
    {
        return $this->salarie;
    }

    public function setSalarie($salarie)
    {
        $this->salarie = $salarie;
    }
}

<?php


namespace Index\BulletinBundle\Entity;


class Task

{

  protected $salaire;

  protected $nom;

  protected $prenom;

  protected $CSG;

  protected $CRDS;

  protected $Secu;

  protected $ASSEDIC;

  protected $retraite;

  protected $AGFF;


  public function getsalaire(){
      return $this->salaire;
  }

  public function getnom(){
      return $this->nom;
  }

  public function getprenom(){
      return $this->prenom;
  }

  public function getCSG(){
      return $this->CSG;
  }

  public function getCRDS(){
      return $this->CRDS;
  }

  public function getSecu(){
      return $this->Secu;
  }

  public function getASSEDIC(){
      return $this->ASSEDIC;
  }

  public function getretraite(){
      return $this->retraite;
  }

  public function getAGFF(){
      return $this->AGFF;
  }

  public function setsalaire($task){
      $this->salaire = $task;
  }

  public function setnom($task){
      $this->nom = $task;
  }

  public function setprenom($task){
      $this->prenom = $task;
  }

  public function setCSG($task){
      $this->CSG = $task;
  }

  public function setCRDS($task){
      $this->CRDS = $task;
  }

  public function setASSEDIC($task){
      $this->ASSEDIC = $task;
  }

  public function setSecu($task){
      $this->Secu = $task;
  }

  public function setretraite($task){
      $this->retraite = $task;
  }

  public function setAGFF($task){
      $this->AGFF = $task;
  }

}

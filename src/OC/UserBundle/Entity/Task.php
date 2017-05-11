<?php

// src/OC/PlatformBundle/Entity/Advert.php


namespace OC\UserBundle\Entity;


class Task{

  protected $salaire;

  protected $nom;

  protected $prenom;

  protected $CSG;

  protected $CRDS;

  protected $Secu;

  protected $ASSEDIC;

  protected $retraite;

  protected $AGFF;


  public function getSalaire(){
      return $this->salaire;
  }

  public function getNom(){
      return $this->nom;
  }

  public function getPrenom(){
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

  public function getRetraite(){
      return $this->retraite;
  }

  public function getAGFF(){
      return $this->AGFF;
  }

  public function setSalaire($task){
      $this->salaire = $task;
  }

  public function setNom($task){
      $this->nom = $task;
  }

  public function setPrenom($task){
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

  public function setRetraite($task){
      $this->retraite = $task;
  }

  public function setAGFF($task){
      $this->AGFF = $task;
  }

}

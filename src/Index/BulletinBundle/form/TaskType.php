<?php
namespace Index\BulletinBundle\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskType extends AbstractType{

  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder->add('salaire', TextType::class)
    ->add('nom', TextType::class)
    ->add('prenom', TextType::class)
    ->add('CSG', TextType::class)
    ->add('CRDS', TextType::class)
    ->add('ASSEDIC', TextType::class)
    ->add('Secu', TextType::class)
    ->add('retraite', TextType::class)
    ->add('AGFF', TextType::class)
    ->add('Generer', SubmitType::class);
  }

  public function getName(){
    return 'task';
  }
}

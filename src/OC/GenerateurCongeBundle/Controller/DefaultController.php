<?php

namespace OC\GenerateurCongeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use OC\GenerateurCongeBundle\Entity\Form;
use OC\GenerateurCongeBundle\Entity\Conges;
use OC\UserBundle\Entity\Salarie;
use Symfony\Component\Form\FormBuilderInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($id,Request $request){
	     $task = new Form();
       $user = $this->container->get('security.token_storage')->getToken()->getUser();

       //select dans la base  de donnee salarie les employes a la charge de la personne qui se connecte
       $em = $this->getDoctrine()->getManager();
	     $query = $em->createQuery(
   	   'SELECT s.id, s.nom, s.prenom
   	   FROM OCUserBundle:Salarie s
   	   WHERE s.superieurhierarchique= :id
	     ORDER BY s.nom ASC')->setParameter('id', $id+2002);


	     //on enregistre dans un tableau les valeurs pour les affichers dans une liste deroulante
	     $s=$query->getResult();
	     $result=[];
	     for($i=0;$i<sizeof($s);$i++){
		       $result[$s[$i]['nom']." ".$s[$i]['prenom']]=$s[$i]['nom']." ".$s[$i]['prenom'];
	     }


       // liste deroulante des salaries a la responsabilite de la personne qui se connecte
       $form = $this->createFormBuilder($task)
       ->add('salarie', ChoiceType::class, array(
        	 'choices'  =>$result,'expanded'=>false,
       'multiple'=>false,))
       ->add('save', SubmitType::class,array('label' => 'Afficher Agenda'))
       ->getForm();

	     /**on test si la personne a choisi dans la liste deroulante un salarie on charge la base de donnee salarie et on l'envoie a la vue calendar.twig*/

	     $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
	        $r = $this->getDoctrine()->getRepository('OCGenerateurCongeBundle:Conges');
          $propositions=$r->findAll();
	        return $this->render('OCGenerateurCongeBundle:Default:calendar.html.twig',array('form' => $form->createView() ,'requete'=>$propositions));
	     }



    	 // formulaire de demande de date de conges
    	 $f = $this->createFormBuilder($task)
                      ->add('debut', TextType::class, array('required' => true,'attr' => array('debut' => 'datepicker')))
    	    ->add('fin', TextType::class,array('required' => false,'attr' => array('fin' => 'datepicker')))
                ->add('save', SubmitType::class, array('label' => 'Demander Congé'))
    	    ->add('reset', ResetType::class, array('label' => 'Annuler'))
                ->getForm();


    	// on test si le formulaire a ete soumis si oui on enregistre les date dans la base de donnee et retourne sur la vue index.twig
    	 $f->handleRequest($request);
       if ($f->isSubmitted() && $f->isValid()) {
    	    $t=new Conges();
    	    $t->setId(67);
    	    $t->setId_Salarie("2003");
    	    $t->setDebut( $f->get('debut')->getData());
          $t->setFin($f->get('fin')->getData());
          $t->setvalide(0);
          $t->setJours_Restants(30);
          $em = $this -> getDoctrine ()-> getManager ();
          $em -> persist ( $t );
          $em -> flush ();
          return $this->render('OCGenerateurCongeBundle:Default:index.html.twig',array('form' => $form->createView() ,'f' => $f->createView()));
    	}

	     // page de redirection par default.
       return $this->render('OCGenerateurCongeBundle:Default:index.html.twig',array('form' => $form->createView() ,'f' => $f->createView()));
    }
}

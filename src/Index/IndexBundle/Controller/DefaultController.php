<?php

namespace Index\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    public function indexAction()
    {
      $user = $this->container->get('security.token_storage')->getToken()->getUser();

      if(!$this->get('security.authorization_checker')->isGranted('ROLE_USER') && !$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

        throw new AccessDeniedException('Accès limité aux employés.');

      }

      if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) ){
          $user = $this->container->get('security.token_storage')->getToken()->getUser();
          $id = $user->getId();
      }
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
        'SELECT s.nom, s.prenom
        FROM OCUserBundle:Salarie s
        WHERE s.id = :id'
        )->setParameter('id', $id+2002);

        $user = $query->getResult();
        $name = $user[0]['nom'];
        $prenom = $user[0]['prenom'];

        $query = $em->createQuery(
        'SELECT s.id, s.sexe, s.nom, s.prenom, s.dateentre, s.superieurhierarchique, s.salaire
        FROM OCUserBundle:Salarie s'
        );

        $users = $query->getResult();
        sort($users);
        $nbUsers = count($users);

        $query = $em->createQuery(
        'SELECT s.id, s.email
        FROM OCUserBundle:salarieCompte s'
        );

        $comptes = $query->getResult();
        sort($comptes);


        return $this->render('IndexIndexBundle:Default:index.html.twig', array(
          'id' => $id,
          'name' => $name,
          'prenom' => $prenom,
          'nbUsers' => $nbUsers,
          'users' => $users,
          'comptes' => $comptes
        ));
    }
}

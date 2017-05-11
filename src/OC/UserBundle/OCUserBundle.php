<?php

// src/OC/UserBundle/OCUserBundle.php


namespace OC\UserBundle;


use Symfony\Component\HttpKernel\Bundle\Bundle;


class OCUserBundle extends Bundle

{

  public function indexAction()
  {
    /*$user = $this->container->get('security.token_storage')->getToken()->getUser();
    echo $user->getRoles()[0];

    if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER') && !$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
      return $this->render('OCUserBundle:Default:index.html.twig');
    }
    throw new AccessDeniedException('Accès limité aux auteurs.');*/
  }

  public function getParent()

  {

    return 'FOSUserBundle';

  }

}

<?php

namespace OC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    public function indexAction()
    {/*
      $user = $this->container->get('security.token_storage')->getToken()->getUser();
      echo $user->getRoles()[0];
      if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER') && !$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
        return $this->render('OCUserBundle:Default:index.html.twig');
      }
      throw new AccessDeniedException('Accès limité aux auteurs.');*/
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        /*return $this->render('OCUserBundle/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);*/
        if($this->get('security.authorization_checker')->isGranted('ROLE_USER') || $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

          return $this->redirect("/home", 301);

        }
        return $this->redirect("/login", 301);
    }
}

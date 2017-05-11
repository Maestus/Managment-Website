<?php

namespace Index\BulletinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MyNamespace\Module\AdministrationBundle\Form\Type\ArticleType;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
      $user = $this->container->get('security.token_storage')->getToken()->getUser();

      if ($user->hasRole('ROLE_ADMIN')){

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

        return $this->render('IndexBulletinBundle:Default:index.html.twig', array(
          'name' => $name,
          'prenom' => $prenom,
          'nbUsers' => $nbUsers,
          'users' => $users,
          'comptes' => $comptes
        ));
      }return $this->render('IndexBulletinBundle:Default:error.html.twig');
    }

    public function generate_pdfAction(Request $request){
      //print_r($_POST['nom']);

      //$dataform = $request->request->get('form');
      //$post = $form->getData();
      //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
      $html = $this->renderView('IndexBulletinBundle:Default:generate.html.twig',array('post'=>$_POST));

      //on instancie la classe Html2Pdf_Html2Pdf en lui passant en paramètre
      //le sens de la page "portrait" => p ou "paysage" => l
      //le format A4,A5...
      //la langue du document fr,en,it...
      //$name = 'Bulletin_de_paie.pdf';
      //return $this->render('IndexBulletinBundle:Default:pdf.html.twig', array('name'=>$name, 'html'=>$html->getContent()));
      $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');

      //SetDisplayMode définit la manière dont le document PDF va être affiché par l’utilisateur
      //fullpage : affiche la page entière sur l'écran
      //fullwidth : utilise la largeur maximum de la fenêtre
      //real : utilise la taille réelle
      $html2pdf->pdf->SetDisplayMode('fullpage');

      //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
      $html2pdf->writeHTML($html);

      //Output envoit le document PDF au navigateur internet avec un nom spécifique qui aura un rapport avec le contenu à convertir (exemple : Facture, Règlement…)

      return new Response($html2pdf->Output('nom-du-pdf.pdf'),200, array('Content-Type' => 'application/pdf'));
    }
}

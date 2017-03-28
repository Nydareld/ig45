<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $etablissement = $em->getRepository('AgendaBundle:Etablissement');
        $nbEtablissement = $etablissement->getNb();

        $nbUser = count($this->get('fos_user.user_manager')->findUsers());

        $niveau = $em->getRepository('AgendaBundle:Niveau');
        $nbNiveau = $niveau->getNb();

        $typeEvenement = $em->getRepository('AgendaBundle:TypeEvenement');
        $nbTypeEvenement = $typeEvenement->getNb();


        return $this->render('BackofficeBaseBundle:Default:index.html.twig',array(
          'etablissement' => $nbEtablissement,
          'user' => $nbUser,
          'niveau' => $nbNiveau,
          'typeEvenement' => $nbTypeEvenement,
        ));
    }
}

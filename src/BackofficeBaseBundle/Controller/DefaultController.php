<?php

namespace BackofficeBaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT count(e.id) as nbE FROM AgendaBundle:Etablissement e');
        $etablissement = $query->getResult();

        $query = $em->createQuery('SELECT count(ev.id) as nbEv FROM AgendaBundle:Evenement ev');
        $evenement = $query->getResult();

        $query = $em->createQuery('SELECT count(n.id) as nbN FROM AgendaBundle:Niveau n');
        $niveau = $query->getResult();

        $query = $em->createQuery('SELECT count(t.id) as nbT FROM AgendaBundle:TypeEvenement t');
        $typeEvenement = $query->getResult();


        return $this->render('BackofficeBaseBundle:Default:index.html.twig',array(
          'etablissement' => $etablissement[0],
          'evenement' => $evenement[0],
          'niveau' => $niveau[0],
          'typeEvenement' => $typeEvenement[0],
        ));
    }
}

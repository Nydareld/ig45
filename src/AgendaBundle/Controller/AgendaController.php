<?php

namespace AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgendaController extends Controller
{
    public function indexAction()
    {
        // récupération de tout les évènements
        $evenements = $this->getDoctrine()
                       ->getRepository('AgendaBundle:Evenement');

        //on envoie tout les évènements au twig
        return $this->render('AgendaBundle:Agenda:agenda.html.twig',
                        array('evenements' => $evenements));
    }

    public function agendaPersoAction()
    {
        // Récupération de l'utilisateur connecté
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $evenements = $this->getDoctrine()->getRepository('AgendaBundle:Evenement')->getByUser($user);

        // on envoie tout les évènements liés à l'utilisateur jusqu'au twig
        return $this->render('AgendaBundle:Evenement:index.html.twig',
                        array('evenements' => $evenements));
    }

    public function searchAction()
    {
        return $this->render('AgendaBundle:Agenda:search.html.twig');
    }
}

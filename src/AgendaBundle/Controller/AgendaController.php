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

        // Récupération de tout les évènements pour l'utilisateur connecté
        $evenements = [];

        $intervention = $user->getInterventions();
        foreach ($intervention as $eventInter) {
            $evenements[] = $eventInter;
        }
        $observations = $user->getObservations();
        foreach ($observations as $eventObs) {
            $evenements[] = $eventObs;
        }

        // ajout des évènements dans lesquelles le user est correspondant
        // $correspondantLieux = $user->getCorrespondantsLieux()->getEvenement();
        // foreach ($adjointLieux as $lieu) {
        //     $evenements[] = $lieu->getEvenement();
        // }
        //
        // // ajout des évènements dans lesquelles le user est adjoint
        // $adjointLieux =     return $this->render('AgendaBundle:Agenda:agenda.html.twig',
        //                array('ev    return $this->render('AgendaBundle:Agenda:agenda.html.twig',
        //                array('evenements' => $evenements)); as $lieu) {
        //     $evenements[] = $lieu->getEvenement();
        // }

        // on envoie tout les évènements liés à l'utilisateur jusqu'au twig
        return $this->render('AgendaBundle:Agenda:agenda.html.twig',
                        array('evenements' => $evenements));
    }

    public function searchAction()
    {
        return $this->render('AgendaBundle:Agenda:search.html.twig');
    }
}

<?php

namespace AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgendaController extends Controller
{
    public function indexAction()
    {
        // récupération de tout les évènements
        $evenements = $this->getDoctrine()
                            ->getRepository('AgendaBundle:Evenement')
                            ->findAll();

        // on envoie tout les évènements au twig
        return $this->render('AgendaBundle:Agenda:agenda.html.twig',
                        array('evenements' => $evenements));
    }

    public function agendaPersoAction()
    {
        // récupération de tout les évènements pour l'utilisateur connecté
        $user = $this->get('security.context')->getToken()->getUser();
        $evenements = [];
        $evenements[] = $user->getInterventions();
        $evenements[] = $user->getObservations();

        // ajout des évènements dans lesquelles le user est correspondant
        $correspondantLieux = $user->getCorrespondantsLieux()->getEvenement();
        foreach ($adjointLieux as $lieu) {
            $evenements[] = $lieu->getEvenement();
        }

        // ajout des évènements dans lesquelles le user est adjoint
        $adjointLieux = $user->getAdjointLieux();
        foreach ($adjointLieux as $lieu) {
            $evenements[] = $lieu->getEvenement();
        }

        // on envoie tout les évènements liés à l'utilisateur jusqu'au twig
        return $this->render('AgendaBundle:Agenda:agenda.html.twig',
                        array('user' => $user));
    }
}

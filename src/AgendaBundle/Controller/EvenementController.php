<?php

namespace AgendaBundle\Controller;

use AgendaBundle\Entity\Etablissement;
use AgendaBundle\Entity\Evenement;
use AgendaBundle\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Evenement controller.
 *
 */
class EvenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $year = date_format(new \DateTime(),'Y');
        $yearPlus = strval(intval($year)+1);
        $yearMoins = strval(intval($year)-1);
        $debut_annee_scolaire = date_format(new \DateTime('09/01/'.$year),'d/m');
        $fin_annee_scolaire = date_format(new \DateTime('08/31/'.$yearPlus),'d/m');
        $debut_annee = date_format(new \DateTime('01/01/'.$year),'d/m');
        $fin_annee = date_format(new \DateTime('12/31/'.$year),'d/m');
        $today = date_format(new \DateTime(),'d/m');

        function isSupDate($d1, $d2){
          $d1 = explode('/',$d1);
          $d2 = explode('/',$d2);
          $d1_m = intval($d1[1]);
          $d1_j = intval($d1[0]);
          $d2_m = intval($d2[1]);
          $d2_j = intval($d2[0]);
          if($d1_m>$d2_m){
            return true;
          }
          else if($d1_m==$d2_m){
            if ($d1_j<$d2_j){
              return false;
            }
            else{
              return true;
            }
          }
          else{
            return false;
          }
        }

        if (isSupDate($fin_annee,$today) && isSupDate($today,$debut_annee_scolaire)){
          $scolaire = $year.' - '.$yearPlus;
        }

        else if (isSupDate($today,$debut_annee) && isSupDate($fin_annee_scolaire,$today)){
          $scolaire = $yearMoins.' - '.$year;
        }

        $annee = $em->getRepository('AgendaBundle:AnneeScolaire')->findOneBy(array('annee' => $scolaire));
        if (!empty($annee)){
          $evenements = $em->getRepository('AgendaBundle:Evenement')->findBy(array('anneeScolaire' => $annee->getId()), array('dateEvt' => 'ASC'));
        }
        else{
          $evenements = null;
        }

        return $this->render('AgendaBundle:Evenement:index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('AgendaBundle\Form\EvenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenement_new_suite', array('id' => $evenement->getId()));
        }

        return $this->render('AgendaBundle:Evenement:new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Method({"GET", "POST"})
     */
    public function SuiteNewAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('AgendaBundle\Form\EvenementTypeSuite', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_index');
        }

        return $this->render('AgendaBundle:Evenement:edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Method("GET")
     */
    public function showAction(Evenement $evenement)
    {

        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('AgendaBundle:Evenement:show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('AgendaBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_edit_suite', array('id' => $evenement->getId()));
        }

        return $this->render('AgendaBundle:Evenement:new.html.twig', array(
            'evenement' => $evenement,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Method({"GET", "POST"})
     */
     public function duplicationAction(Request $request, Evenement $evenement)
     {
       $evenementDuplicated = clone($evenement);
       $evenementDuplicated->removeId();
       $evenementDuplicated->setDateEvt(new \DateTime("2017-01-01"));
       $evenementDuplicated->setHeureDebut(new \DateTime("00:00"));
       $evenementDuplicated->setHeureFin(new \DateTime("00:00"));
       $evenementDuplicated->setIntervenants(null);
       $evenementDuplicated->setObservateurs(null);

       $form = $this->createForm('AgendaBundle\Form\EvenementType', $evenementDuplicated);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $em->persist($evenementDuplicated);
         $em->flush();

         return $this->redirectToRoute('evenement_new_suite', array('id' => $evenementDuplicated->getId()));
       }

       return $this->render('AgendaBundle:Evenement:new.html.twig', array(
         'evenementDuplicated' => $evenementDuplicated,
         'form' => $form->createView()
       ));
     }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Method({"GET", "POST"})
     */
    public function suiteEditAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('AgendaBundle\Form\EvenementTypeSuite', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_index');
        }

        return $this->render('AgendaBundle:Evenement:edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evenement $evenement)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement->setAnnule(true);
        $em->persist($evenement);
        $em->flush();

        return $this->redirectToRoute('evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenement_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function exportAction(Evenement $evenement){

        //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques

        $html = $this->renderView('AgendaBundle:Evenement:showExport.html.twig', array('evenement' => $evenement));


        //if you are in a controlller use :
        $pdf = $this->get("white_october.tcpdf")->create('vertical', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetTitle(("Fiche d'intervention"));
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica', '', 11, '', true);

        $pdf->AddPage();

        $filename = 'ficheIntervention';

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->Output($filename.".pdf",'I'); // This will output the PDF as a response directly
    }

    public function reactivateAction(Request $request, Evenement $evenement)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement->setAnnule(false);
        $em->persist($evenement);
        $em->flush();

        return $this->redirectToRoute('evenement_index');
    }

    public function searchEvenementAction(Request $request)
    {
        $form = $this->createForm('AgendaBundle\Form\EvenementSearchType');

        if ($form->handleRequest($request)->isSubmitted()) {

            if(($form['etablissement']->getData()) != null){
                $etablissement = $form['etablissement']->getData()->getId();
            }
            if (($form['dateIntervention']->getData()) != null){
                $date = $form['dateIntervention']->getData();
            }
            if (($form['complet']->getData()) == true){
                $complet = $form['complet']->getData();

            }
            if (($form['niveau']->getData() != null)){
                $niveau = $form['niveau']->getData();
            }
            if (($form['type']->getData() != null)){
                $type = $form['type']->getData();
            }
            if (($form['annee']->getData() != null)){
                $annee = $form['annee']->getData();
            }

            $repository = $this->getDoctrine()->getRepository('AgendaBundle:Evenement');

            $evenements = $repository->findAll();

            foreach ($evenements as $event){
                $remove = false;
                if(isset($etablissement) && $remove == false){
                    if ($etablissement != $event->getEtablissement()->getId()){
                        unset($evenements[array_search($event, $evenements)]);
                        $remove = true;
                    }
                }
                if(isset($date) && $remove == false){
                   if($event->getDateEvt() != $date){
                       unset($evenements[array_search($event, $evenements)]);
                       $remove = true;
                   }
                }
                if(isset($complet) && $remove == false){
                    if($event->isComplet() == $complet){
                        unset($evenements[array_search($event, $evenements)]);
                        $remove = true;
                    }
                }
                if(isset($niveau) && $remove == false){
                    $test = true;
                    foreach ($event->getNiveaux() as $nival){
                        if($nival == $niveau){
                            $test = false;
                        }
                    }
                    if($test){
                        unset($evenements[array_search($event, $evenements)]);
                        $remove = true;
                    }
                }
                if(isset($type) && $remove == false){
                    foreach ($event->getTypeEvenement() as $typ){
                        if ($typ != $type){
                            unset($evenements[array_search($event, $evenements)]);
                            $remove = true;
                        }
                    }
                }
                if(isset($annee) && $remove == false){
                    if($event->getAnneeScolaire() != $annee){
                        unset($evenements[array_search($event, $evenements)]);
                        $remove = true;
                    }
                }
            }
            return $this->render('AgendaBundle:Evenement:index.html.twig', array('evenements' => $evenements));
        }

        $repo_type = $this->getDoctrine()->getRepository('AgendaBundle:Niveau');
        $repo_etable = $this->getDoctrine()->getRepository('AgendaBundle:Etablissement');
        $etablissements = $repo_etable->findAll();
        $niveaux = $repo_type->findAll();
        return $this->render('AgendaBundle:Evenement:search.html.twig', array(
            'form' => $form->createView(),
            'niveaux' => $niveaux,
            'etablissements' => $etablissements,
        ));
    }
}

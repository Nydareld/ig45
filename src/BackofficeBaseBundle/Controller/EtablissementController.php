<?php

namespace BackofficeBaseBundle\Controller;

use AgendaBundle\Entity\etablissement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * etablissementx controller.
 *
 */
class EtablissementController extends Controller
{
    /**
     * Lists all etablissement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etablissement = $em->getRepository('AgendaBundle:Etablissement')->findAll();

        return $this->render('BackofficeBaseBundle:Etablissement:index.html.twig', array(
            'etablissements' => $etablissement,
        ));
    }

    /**
     * Creates a new Etablissement entity.
     *
     */
    public function newAction(Request $request)
    {
        $etablissement = new Etablissement();
        $form = $this->createForm('BackofficeBaseBundle\Form\EtablissementType', $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush($etablissement);

            return $this->redirectToRoute('etablissement_show', array('id' => $etablissement->getId()));
        }

        return $this->render('BackofficeBaseBundle:Etablissement:new.html.twig', array(
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etablissement entity.
     *
     */
    public function showAction(Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);

        return $this->render('BackofficeBaseBundle:Etablissement:show.html.twig', array(
            'etablissement' => $etablissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etablissement entity.
     *
     */
    public function editAction(Request $request, Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);
        $editForm = $this->createForm('BackofficeBaseBundle\Form\EtablissementType', $etablissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etablissement_edit', array('id' => $etablissement->getId()));
        }

        return $this->render('BackofficeBaseBundle:Etablissement:edit.html.twig', array(
            'etablissement' => $etablissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etablissement entity.
     *
     */
    public function deleteAction(Request $request, Etablissement $etablissement)
    {
        $form = $this->createDeleteForm($etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }

        return $this->redirectToRoute('etablissement_index');
    }

    /**
     * Creates a form to delete a etablissement entity.
     *
     * @param Etablissement $etablissement The etablissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etablissement $etablissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissement_delete', array('id' => $etablissement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

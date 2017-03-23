<?php

namespace BackofficeBaseBundle\Controller;

use AgendaBundle\Entity\Lieux;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lieux controller.
 *
 */
class LieuxController extends Controller
{
    /**
     * Lists all lieux entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lieuxes = $em->getRepository('AgendaBundle:Lieux')->findAll();

        return $this->render('BackofficeBaseBundle:Lieux:index.html.twig', array(
            'lieuxes' => $lieuxes,
        ));
    }

    /**
     * Creates a new lieux entity.
     *
     */
    public function newAction(Request $request)
    {
        $lieux = new Lieux();
        $form = $this->createForm('BackofficeBaseBundle\Form\LieuxType', $lieux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieux);
            $em->flush($lieux);

            return $this->redirectToRoute('lieux_show', array('id' => $lieux->getId()));
        }

        return $this->render('BackofficeBaseBundle:Lieux:new.html.twig', array(
            'lieux' => $lieux,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lieux entity.
     *
     */
    public function showAction(Lieux $lieux)
    {
        $deleteForm = $this->createDeleteForm($lieux);

        return $this->render('BackofficeBaseBundle:Lieux:show.html.twig', array(
            'lieux' => $lieux,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lieux entity.
     *
     */
    public function editAction(Request $request, Lieux $lieux)
    {
        $deleteForm = $this->createDeleteForm($lieux);
        $editForm = $this->createForm('BackofficeBaseBundle\Form\LieuxType', $lieux);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lieux_edit', array('id' => $lieux->getId()));
        }

        return $this->render('BackofficeBaseBundle:Lieux:edit.html.twig', array(
            'lieux' => $lieux,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lieux entity.
     *
     */
    public function deleteAction(Request $request, Lieux $lieux)
    {
        $form = $this->createDeleteForm($lieux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieux);
            $em->flush();
        }

        return $this->redirectToRoute('lieux_index');
    }

    /**
     * Creates a form to delete a lieux entity.
     *
     * @param Lieux $lieux The lieux entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lieux $lieux)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lieux_delete', array('id' => $lieux->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

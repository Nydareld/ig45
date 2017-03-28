<?php

namespace BackofficeBaseBundle\Controller;

use AgendaBundle\Entity\TypeEvenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeevenement controller.
 *
 */
class TypeEvenementController extends Controller
{
    /**
     * Lists all typeEvenement entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $typeEvenement = new Typeevenement();
        $form = $this->createForm('BackofficeBaseBundle\Form\TypeEvenementType', $typeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeEvenement);
            $em->flush();

            return $this->redirectToRoute('typeevenement_show', array('id' => $typeEvenement->getId()));
        }

        $typeEvenements = $em->getRepository('AgendaBundle:TypeEvenement')->findAll();

        return $this->render('BackofficeBaseBundle:TypeEvenement:index.html.twig', array(
            'form' => $form->createView(),
            'typeEvenements' => $typeEvenements,
        ));
    }

    /**
     * Finds and displays a typeEvenement entity.
     *
     */
    public function showAction(Request $request, TypeEvenement $typeEvenement)
    {
        $deleteForm = $this->createDeleteForm($typeEvenement);

        $editForm = $this->createForm('BackofficeBaseBundle\Form\TypeEvenementType', $typeEvenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeevenement_show', array('id' => $typeEvenement->getId()));
        }


        return $this->render('BackofficeBaseBundle:TypeEvenement:show.html.twig', array(
            'typeEvenement' => $typeEvenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeEvenement entity.
     *
     */
    public function deleteAction(Request $request, TypeEvenement $typeEvenement)
    {
        $form = $this->createDeleteForm($typeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeEvenement);
            $em->flush();
        }

        return $this->redirectToRoute('typeevenement_index');
    }

    /**
     * Creates a form to delete a typeEvenement entity.
     *
     * @param TypeEvenement $typeEvenement The typeEvenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeEvenement $typeEvenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeevenement_delete', array('id' => $typeEvenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

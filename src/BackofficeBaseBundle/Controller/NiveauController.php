<?php

namespace BackofficeBaseBundle\Controller;

use AgendaBundle\Entity\Niveau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Niveau controller.
 *
 */
class NiveauController extends Controller
{
    /**
     * Lists all niveau entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $niveau = new Niveau();
        $form = $this->createForm('BackofficeBaseBundle\Form\NiveauType', $niveau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($niveau);
            $em->flush();

            return $this->redirectToRoute('niveau_show', array('id' => $niveau->getId()));
        }

        $niveaux = $em->getRepository('AgendaBundle:Niveau')->findAll();
        return $this->render('BackofficeBaseBundle:Niveau:index.html.twig', array(
            'form' => $form->createView(),
            'niveaux' => $niveaux,
        ));
    }

    /**
     * Finds and displays a niveau entity.
     *
     */
    public function showAction(Niveau $niveau)
    {
        $deleteForm = $this->createDeleteForm($niveau);

        return $this->render('BackofficeBaseBundle:Niveau:show.html.twig', array(
            'niveau' => $niveau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing niveau entity.
     *
     */
    public function editAction(Request $request, Niveau $niveau)
    {
        $deleteForm = $this->createDeleteForm($niveau);
        $editForm = $this->createForm('BackofficeBaseBundle\Form\NiveauType', $niveau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('niveau_edit', array('id' => $niveau->getId()));
        }

        return $this->render('BackofficeBaseBundle:Niveau:edit.html.twig', array(
            'niveau' => $niveau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a niveau entity.
     *
     */
    public function deleteAction(Request $request, Niveau $niveau)
    {
        $form = $this->createDeleteForm($niveau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($niveau);
            $em->flush();
        }

        return $this->redirectToRoute('niveau_index');
    }

    /**
     * Creates a form to delete a niveau entity.
     *
     * @param Niveau $niveau The niveau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Niveau $niveau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('niveau_delete', array('id' => $niveau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

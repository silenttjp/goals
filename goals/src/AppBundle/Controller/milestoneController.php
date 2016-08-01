<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\milestone;
use AppBundle\Form\milestoneType;

/**
 * milestone controller.
 *
 * @Route("/milestone")
 */
class milestoneController extends Controller
{
    /**
     * Lists all milestone entities.
     *
     * @Route("/", name="milestone_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $milestones = $em->getRepository('AppBundle:milestone')->findAll();

        return $this->render('milestone/index.html.twig', array(
            'milestones' => $milestones,
        ));
    }

    /**
     * Creates a new milestone entity.
     *
     * @Route("/new", name="milestone_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $milestone = new milestone();
        $form = $this->createForm('AppBundle\Form\milestoneType', $milestone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($milestone);
            $em->flush();

            return $this->redirectToRoute('milestone_show', array('id' => $milestone->getId()));
        }

        return $this->render('milestone/new.html.twig', array(
            'milestone' => $milestone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a milestone entity.
     *
     * @Route("/{id}", name="milestone_show")
     * @Method("GET")
     */
    public function showAction(milestone $milestone)
    {
        $deleteForm = $this->createDeleteForm($milestone);

        return $this->render('milestone/show.html.twig', array(
            'milestone' => $milestone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing milestone entity.
     *
     * @Route("/{id}/edit", name="milestone_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, milestone $milestone)
    {
        $deleteForm = $this->createDeleteForm($milestone);
        $editForm = $this->createForm('AppBundle\Form\milestoneType', $milestone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($milestone);
            $em->flush();

            return $this->redirectToRoute('milestone_edit', array('id' => $milestone->getId()));
        }

        return $this->render('milestone/edit.html.twig', array(
            'milestone' => $milestone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a milestone entity.
     *
     * @Route("/{id}", name="milestone_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, milestone $milestone)
    {
        $form = $this->createDeleteForm($milestone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($milestone);
            $em->flush();
        }

        return $this->redirectToRoute('milestone_index');
    }

    /**
     * Creates a form to delete a milestone entity.
     *
     * @param milestone $milestone The milestone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(milestone $milestone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('milestone_delete', array('id' => $milestone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

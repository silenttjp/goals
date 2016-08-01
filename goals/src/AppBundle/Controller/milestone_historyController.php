<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\milestone_history;
use AppBundle\Form\milestone_historyType;

/**
 * milestone_history controller.
 *
 * @Route("/milestone_history")
 */
class milestone_historyController extends Controller
{
    /**
     * Lists all milestone_history entities.
     *
     * @Route("/", name="milestone_history_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $milestone_histories = $em->getRepository('AppBundle:milestone_history')->findAll();

        return $this->render('milestone_history/index.html.twig', array(
            'milestone_histories' => $milestone_histories,
        ));
    }

    /**
     * Creates a new milestone_history entity.
     *
     * @Route("/new", name="milestone_history_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $milestone_history = new milestone_history();
        $form = $this->createForm('AppBundle\Form\milestone_historyType', $milestone_history);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($milestone_history);
            $em->flush();

            return $this->redirectToRoute('milestone_history_show', array('id' => $milestone_history->getId()));
        }

        return $this->render('milestone_history/new.html.twig', array(
            'milestone_history' => $milestone_history,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a milestone_history entity.
     *
     * @Route("/{id}", name="milestone_history_show")
     * @Method("GET")
     */
    public function showAction(milestone_history $milestone_history)
    {
        $deleteForm = $this->createDeleteForm($milestone_history);

        return $this->render('milestone_history/show.html.twig', array(
            'milestone_history' => $milestone_history,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing milestone_history entity.
     *
     * @Route("/{id}/edit", name="milestone_history_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, milestone_history $milestone_history)
    {
        $deleteForm = $this->createDeleteForm($milestone_history);
        $editForm = $this->createForm('AppBundle\Form\milestone_historyType', $milestone_history);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($milestone_history);
            $em->flush();

            return $this->redirectToRoute('milestone_history_edit', array('id' => $milestone_history->getId()));
        }

        return $this->render('milestone_history/edit.html.twig', array(
            'milestone_history' => $milestone_history,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a milestone_history entity.
     *
     * @Route("/{id}", name="milestone_history_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, milestone_history $milestone_history)
    {
        $form = $this->createDeleteForm($milestone_history);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($milestone_history);
            $em->flush();
        }

        return $this->redirectToRoute('milestone_history_index');
    }

    /**
     * Creates a form to delete a milestone_history entity.
     *
     * @param milestone_history $milestone_history The milestone_history entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(milestone_history $milestone_history)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('milestone_history_delete', array('id' => $milestone_history->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

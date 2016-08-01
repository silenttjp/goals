<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\goal;
use AppBundle\Form\goalType;

/**
 * goal controller.
 *
 * @Route("/goal")
 */
class goalController extends Controller
{
    /**
     * Lists all goal entities.
     *
     * @Route("/", name="goal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $goals = $em->getRepository('AppBundle:goal')->findAll();

        return $this->render('goal/index.html.twig', array(
            'goals' => $goals,
        ));
    }

    /**
     * Creates a new goal entity.
     *
     * @Route("/new", name="goal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $goal = new goal();
        $form = $this->createForm('AppBundle\Form\goalType', $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($goal);
            $em->flush();

            return $this->redirectToRoute('goal_show', array('id' => $goal->getId()));
        }

        return $this->render('goal/new.html.twig', array(
            'goal' => $goal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a goal entity.
     *
     * @Route("/{id}", name="goal_show")
     * @Method("GET")
     */
    public function showAction(goal $goal)
    {
        $deleteForm = $this->createDeleteForm($goal);

        return $this->render('goal/show.html.twig', array(
            'goal' => $goal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing goal entity.
     *
     * @Route("/{id}/edit", name="goal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, goal $goal)
    {
        $deleteForm = $this->createDeleteForm($goal);
        $editForm = $this->createForm('AppBundle\Form\goalType', $goal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($goal);
            $em->flush();

            return $this->redirectToRoute('goal_edit', array('id' => $goal->getId()));
        }

        return $this->render('goal/edit.html.twig', array(
            'goal' => $goal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a goal entity.
     *
     * @Route("/{id}", name="goal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, goal $goal)
    {
        $form = $this->createDeleteForm($goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($goal);
            $em->flush();
        }

        return $this->redirectToRoute('goal_index');
    }

    /**
     * Creates a form to delete a goal entity.
     *
     * @param goal $goal The goal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(goal $goal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('goal_delete', array('id' => $goal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

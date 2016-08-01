<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\type;
use AppBundle\Form\typeType;

/**
 * type controller.
 *
 * @Route("/type")
 */
class typeController extends Controller
{
    /**
     * Lists all type entities.
     *
     * @Route("/", name="type_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $types = $em->getRepository('AppBundle:type')->findAll();

        return $this->render('type/index.html.twig', array(
            'types' => $types,
        ));
    }

    /**
     * Creates a new type entity.
     *
     * @Route("/new", name="type_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $type = new type();
        $form = $this->createForm('AppBundle\Form\typeType', $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('type_show', array('id' => $type->getId()));
        }

        return $this->render('type/new.html.twig', array(
            'type' => $type,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type entity.
     *
     * @Route("/{id}", name="type_show")
     * @Method("GET")
     */
    public function showAction(type $type)
    {
        $deleteForm = $this->createDeleteForm($type);

        return $this->render('type/show.html.twig', array(
            'type' => $type,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type entity.
     *
     * @Route("/{id}/edit", name="type_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, type $type)
    {
        $deleteForm = $this->createDeleteForm($type);
        $editForm = $this->createForm('AppBundle\Form\typeType', $type);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('type_edit', array('id' => $type->getId()));
        }

        return $this->render('type/edit.html.twig', array(
            'type' => $type,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type entity.
     *
     * @Route("/{id}", name="type_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, type $type)
    {
        $form = $this->createDeleteForm($type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($type);
            $em->flush();
        }

        return $this->redirectToRoute('type_index');
    }

    /**
     * Creates a form to delete a type entity.
     *
     * @param type $type The type entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(type $type)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_delete', array('id' => $type->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cimetiere\Bundle\Entity\Defunt;
use Cimetiere\Bundle\Form\DefuntType;

/**
 * Defunt controller.
 *
 */
class DefuntController extends Controller
{

    /**
     * Lists all Defunt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CimetiereBundle:Defunt')->findAll();
        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/* page number */, 20/* limit per page */);
        return $this->render('CimetiereBundle:Defunt:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Defunt entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Defunt();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('defunt_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:Defunt:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Defunt entity.
    *
    * @param Defunt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Defunt $entity)
    {
        $form = $this->createForm(new DefuntType(), $entity, array(
            'action' => $this->generateUrl('defunt_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Displays a form to create a new Defunt entity.
     *
     */
    public function newAction()
    {
        $entity = new Defunt();
        $form   = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:Defunt:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Defunt entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Defunt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defunt entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Defunt:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Defunt entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Defunt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defunt entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Defunt:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Defunt entity.
    *
    * @param Defunt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Defunt $entity)
    {
        $form = $this->createForm(new DefuntType(), $entity, array(
            'action' => $this->generateUrl('defunt_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }
    /**
     * Edits an existing Defunt entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Defunt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defunt entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('defunt_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:Defunt:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Defunt entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:Defunt')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Defunt entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('defunt'));
    }

    /**
     * Creates a form to delete a Defunt entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('defunt_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class' => 'btn btn-danger btn-large')))
            ->getForm()
        ;
    }
}

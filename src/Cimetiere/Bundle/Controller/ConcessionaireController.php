<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cimetiere\Bundle\Entity\Concessionaire;
use Cimetiere\Bundle\Form\ConcessionaireType;

/**
 * Concessionaire controller.
 *
 */
class ConcessionaireController extends Controller
{

    /**
     * Lists all Concessionaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CimetiereBundle:Concessionaire')->findAll();
        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/* page number */, 20/* limit per page */);
        return $this->render('CimetiereBundle:Concessionaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Concessionaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Concessionaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('concessionaire_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:Concessionaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Concessionaire entity.
    *
    * @param Concessionaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Concessionaire $entity)
    {
        $form = $this->createForm(new ConcessionaireType(), $entity, array(
            'action' => $this->generateUrl('concessionaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer','attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Displays a form to create a new Concessionaire entity.
     *
     */
    public function newAction()
    {
        $entity = new Concessionaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:Concessionaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Concessionaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concessionaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concessionaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Concessionaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Concessionaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concessionaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concessionaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Concessionaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Concessionaire entity.
    *
    * @param Concessionaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Concessionaire $entity)
    {
        $form = $this->createForm(new ConcessionaireType(), $entity, array(
            'action' => $this->generateUrl('concessionaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier','attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }
    /**
     * Edits an existing Concessionaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concessionaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concessionaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('concessionaire_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:Concessionaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Concessionaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:Concessionaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Concessionaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('concessionaire'));
    }

    /**
     * Creates a form to delete a Concessionaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concessionaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class' => 'btn btn-danger btn-large')))
            ->getForm()
        ;
    }
}

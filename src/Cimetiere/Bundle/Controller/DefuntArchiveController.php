<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cimetiere\Bundle\Entity\DefuntArchive;
use Cimetiere\Bundle\Form\DefuntArchiveType;

/**
 * DefuntArchive controller.
 *
 */
class DefuntArchiveController extends Controller
{

    /**
     * Lists all DefuntArchive entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CimetiereBundle:DefuntArchive')->findAll();

        return $this->render('CimetiereBundle:DefuntArchive:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DefuntArchive entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DefuntArchive();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('defuntarchive_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:DefuntArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a DefuntArchive entity.
    *
    * @param DefuntArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(DefuntArchive $entity)
    {
        $form = $this->createForm(new DefuntArchiveType(), $entity, array(
            'action' => $this->generateUrl('defuntarchive_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DefuntArchive entity.
     *
     */
    public function newAction()
    {
        $entity = new DefuntArchive();
        $form   = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:DefuntArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DefuntArchive entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:DefuntArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DefuntArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:DefuntArchive:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing DefuntArchive entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:DefuntArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DefuntArchive entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:DefuntArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DefuntArchive entity.
    *
    * @param DefuntArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DefuntArchive $entity)
    {
        $form = $this->createForm(new DefuntArchiveType(), $entity, array(
            'action' => $this->generateUrl('defuntarchive_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DefuntArchive entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:DefuntArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DefuntArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('defuntarchive_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:DefuntArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DefuntArchive entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:DefuntArchive')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DefuntArchive entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('defuntarchive'));
    }

    /**
     * Creates a form to delete a DefuntArchive entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('defuntarchive_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

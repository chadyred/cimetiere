<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cimetiere\Bundle\Entity\ConcessionaireArchive;
use Cimetiere\Bundle\Form\ConcessionaireArchiveType;

/**
 * ConcessionaireArchive controller.
 *
 */
class ConcessionaireArchiveController extends Controller
{

    /**
     * Lists all ConcessionaireArchive entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CimetiereBundle:ConcessionaireArchive')->findAll();

        return $this->render('CimetiereBundle:ConcessionaireArchive:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ConcessionaireArchive entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ConcessionaireArchive();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('concessionairearchive_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:ConcessionaireArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ConcessionaireArchive entity.
    *
    * @param ConcessionaireArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ConcessionaireArchive $entity)
    {
        $form = $this->createForm(new ConcessionaireArchiveType(), $entity, array(
            'action' => $this->generateUrl('concessionairearchive_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConcessionaireArchive entity.
     *
     */
    public function newAction()
    {
        $entity = new ConcessionaireArchive();
        $form   = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:ConcessionaireArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConcessionaireArchive entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionaireArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionaireArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:ConcessionaireArchive:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ConcessionaireArchive entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionaireArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionaireArchive entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:ConcessionaireArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConcessionaireArchive entity.
    *
    * @param ConcessionaireArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConcessionaireArchive $entity)
    {
        $form = $this->createForm(new ConcessionaireArchiveType(), $entity, array(
            'action' => $this->generateUrl('concessionairearchive_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ConcessionaireArchive entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionaireArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionaireArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('concessionairearchive_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:ConcessionaireArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConcessionaireArchive entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:ConcessionaireArchive')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConcessionaireArchive entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('concessionairearchive'));
    }

    /**
     * Creates a form to delete a ConcessionaireArchive entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concessionairearchive_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

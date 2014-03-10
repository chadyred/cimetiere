<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cimetiere\Bundle\Entity\ConcessionArchive;
use Cimetiere\Bundle\Form\ConcessionArchiveType;

/**
 * ConcessionArchive controller.
 *
 */
class ConcessionArchiveController extends Controller
{

    /**
     * Lists all ConcessionArchive entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CimetiereBundle:ConcessionArchive')->findAll();

        return $this->render('CimetiereBundle:ConcessionArchive:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ConcessionArchive entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ConcessionArchive();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('concessionarchive_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:ConcessionArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ConcessionArchive entity.
    *
    * @param ConcessionArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ConcessionArchive $entity)
    {
        $form = $this->createForm(new ConcessionArchiveType(), $entity, array(
            'action' => $this->generateUrl('concessionarchive_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ConcessionArchive entity.
     *
     */
    public function newAction()
    {
        $entity = new ConcessionArchive();
        $form   = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:ConcessionArchive:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ConcessionArchive entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:ConcessionArchive:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ConcessionArchive entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionArchive entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:ConcessionArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ConcessionArchive entity.
    *
    * @param ConcessionArchive $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConcessionArchive $entity)
    {
        $form = $this->createForm(new ConcessionArchiveType(), $entity, array(
            'action' => $this->generateUrl('concessionarchive_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ConcessionArchive entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:ConcessionArchive')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConcessionArchive entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('concessionarchive_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:ConcessionArchive:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ConcessionArchive entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:ConcessionArchive')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConcessionArchive entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('concessionarchive'));
    }

    /**
     * Creates a form to delete a ConcessionArchive entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concessionarchive_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

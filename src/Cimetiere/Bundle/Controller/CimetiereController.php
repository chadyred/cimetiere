<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cimetiere\Bundle\Entity\Cimetiere;
use Cimetiere\Bundle\Form\CimetiereType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Cimetiere controller.
 *
 */
class CimetiereController extends Controller {

    /**
     * Lists all Cimetiere entities.
     *
     */
    public function indexAction(Request $request) {
        $entity = new Cimetiere();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('CimetiereBundle:Cimetiere')->findAll();
        $form = $this->createSearchForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $codeCimetiere = $form->get('codeCimetiere')->getData();
            $nomCimetiere = $form->get('nomCimetiere')->getData();
            $entities = $em->getRepository('CimetiereBundle:Cimetiere')->findEntities($codeCimetiere,$nomCimetiere);
        } else {
            $entities = $em->getRepository('CimetiereBundle:Cimetiere')->findAll();
        }
        return $this->render('CimetiereBundle:Cimetiere:index.html.twig', array(
                    'entities' => $entities, 'search_form' => $form->createView(),
        ));
    }

    public function getAjaxResultsNomCimetiereAction() {
        $request = $this->container->get('request');
        if ($request->isXmlHttpRequest()) {
            $term = $request->query->get('term');
            $array = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('CimetiereBundle:Cimetiere')
                    ->listeNomCimetiere($term);
            return new JsonResponse($array);
        }
    }
    
    public function getAjaxResultsCodeCimetiereAction() {
        $request = $this->container->get('request');
        if ($request->isXmlHttpRequest()) {
            $term = $request->query->get('term');
            $array = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('CimetiereBundle:Cimetiere')
                    ->listeCodeCimetiere($term);
            return new JsonResponse($array);
        }
    }

    /**
     * Creates a form to create a Cimetiere entity.
     *
     * @param Cimetiere $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createSearchForm(Cimetiere $entity) {
        $form = $this->createForm(new CimetiereType(), $entity, array(
            'action' => $this->generateUrl('cimetiere'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Rechercher', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Creates a new Cimetiere entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Cimetiere();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cimetiere_show', array('id' => $entity->getId())));
        }

        return $this->render('CimetiereBundle:Cimetiere:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cimetiere entity.
     *
     * @param Cimetiere $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cimetiere $entity) {
        $form = $this->createForm(new CimetiereType(), $entity, array(
            'action' => $this->generateUrl('cimetiere_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Displays a form to create a new Cimetiere entity.
     *
     */
    public function newAction() {
        $entity = new Cimetiere();
        $form = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:Cimetiere:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cimetiere entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Cimetiere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cimetiere entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Cimetiere:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Cimetiere entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Cimetiere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cimetiere entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CimetiereBundle:Cimetiere:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Cimetiere entity.
     *
     * @param Cimetiere $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Cimetiere $entity) {
        $form = $this->createForm(new CimetiereType(), $entity, array(
            'action' => $this->generateUrl('cimetiere_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Edits an existing Cimetiere entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Cimetiere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cimetiere entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cimetiere_edit', array('id' => $id)));
        }

        return $this->render('CimetiereBundle:Cimetiere:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cimetiere entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:Cimetiere')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cimetiere entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cimetiere'));
    }

    /**
     * Creates a form to delete a Cimetiere entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('cimetiere_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Supprimer', 'attr' => array('class' => 'btn btn-danger btn-large')))
                        ->getForm()
        ;
    }

}

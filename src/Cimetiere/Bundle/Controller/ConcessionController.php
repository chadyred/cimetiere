<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Cimetiere\Bundle\Entity\Concession;
use Cimetiere\Bundle\Form\ConcessionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Concession controller.
 *
 * @Route("/concession")
 */
class ConcessionController extends Controller {

    /**
     * Lists all Concession entities.
     *
     * @Route("/", name="concession")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request) {
        $entity = new Concession();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('CimetiereBundle:Concession')->findAll();
        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/* page number */, 20/* limit per page */);
        $form = $this->createSearchForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $codeGestionConcession = $form->get('codeGestionConcession')->getData();
            $nbPlaces = $form->get('nbPlaces')->getData();
            $dateEcheance = $form->get('dateEcheance')->getData();
            $dateDerniereAcquisition = $form->get('dateDerniereAcquisition')->getData();
            $numeroTitreConcession = $form->get('numeroTitreConcession')->getData();
            $entities = $em->getRepository('CimetiereBundle:Concession')->findEntities($codeGestionConcession, $nbPlaces, $dateEcheance, $dateDerniereAcquisition, $numeroTitreConcession);
            $paginator = $this->get('knp_paginator');
            $entities = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/* page number */, 20/* limit per page */);
        } else {
            $entities = $em->getRepository('CimetiereBundle:Concession')->findAll();
            $paginator = $this->get('knp_paginator');
            $entities = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/* page number */, 20/* limit per page */);
        }
        return $this->render('CimetiereBundle:Concession:index.html.twig', array(
                    'entities' => $entities, 'search_form' => $form->createView(),
        ));
    }

    public function getAjaxResultscodeGestionConcessionAction() {
        $request = $this->container->get('request');
        if ($request->isXmlHttpRequest()) {
            $term = $request->query->get('term');
            $array = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('CimetiereBundle:Concession')
                    ->listecodeGestionConcession($term);
            return new JsonResponse($array);
        }
    }

    public function getAjaxResultsnbPlacesAction() {
        $request = $this->container->get('request');
        if ($request->isXmlHttpRequest()) {
            $term = $request->query->get('term');
            $array = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('CimetiereBundle:Concession')
                    ->listenbPlaces($term);
            return new JsonResponse($array);
        }
    }

    public function getAjaxResultsnumeroTitreConcessionAction() {
        $request = $this->container->get('request');
        if ($request->isXmlHttpRequest()) {
            $term = $request->query->get('term');
            $array = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('CimetiereBundle:Concession')
                    ->listenumeroTitreConcession($term);
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
    private function createSearchForm(Concession $entity) {
        $form = $this->createForm(new ConcessionType(), $entity, array(
            'action' => $this->generateUrl('concession'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Rechercher', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Creates a new Concession entity.
     *
     * @Route("/", name="concession_create")
     * @Method("POST")
     * @Template("CimetiereBundle:Concession:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Concession();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('concession_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Concession entity.
     *
     * @param Concession $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Concession $entity) {
        $form = $this->createForm(new ConcessionType(), $entity, array(
            'action' => $this->generateUrl('concession_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Displays a form to create a new Concession entity.
     *
     * @Route("/new", name="concession_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Concession();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Concession entity.
     *
     * @Route("/{id}", name="concession_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Concession entity.
     *
     * @Route("/{id}/edit", name="concession_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concession entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Concession entity.
     *
     * @param Concession $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Concession $entity) {
        $form = $this->createForm(new ConcessionType(), $entity, array(
            'action' => $this->generateUrl('concession_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    /**
     * Edits an existing Concession entity.
     *
     * @Route("/{id}", name="concession_update")
     * @Method("PUT")
     * @Template("CimetiereBundle:Concession:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CimetiereBundle:Concession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('concession_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Concession entity.
     *
     * @Route("/{id}", name="concession_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CimetiereBundle:Concession')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Concession entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('concession'));
    }

    /**
     * Creates a form to delete a Concession entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('concession_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Supprimer', 'attr' => array('class' => 'btn btn-danger btn-large')))
                        ->getForm()
        ;
    }

}

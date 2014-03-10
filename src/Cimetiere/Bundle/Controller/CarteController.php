<?php

namespace Cimetiere\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cimetiere\Bundle\Entity\Cimetiere;
use Cimetiere\Bundle\Entity\RechercheCarte;
use Cimetiere\Bundle\Form\RechercheCarteType;

class CarteController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('CimetiereBundle:Cimetiere')->findAll();

        $entity = new RechercheCarte();
        $form = $this->createCreateForm($entity);

        return $this->render('CimetiereBundle:Carte:index.html.twig', array(
                    'entity' => $entity, 'entities' => $entities,
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
    private function createCreateForm(RechercheCarte $entity) {
        $form = $this->createForm(new RechercheCarteType(), $entity, array(
            'action' => $this->generateUrl('carte_find'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Rechercher', 'attr' => array('class' => 'btn btn-primary btn-large')));

        return $form;
    }

    public function findAction(Request $request) {
        $entity = new RechercheCarte();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity2 = $em->getRepository('CimetiereBundle:Cimetiere')->findCarte($entity->getNomCimetiere());
            return $this->redirect($this->generateUrl('carte_show', array('id' => $entity2[0])));
        }
        return $this->render('CimetiereBundle:Carte:find.html.twig', array(
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

        $entity = $em->getRepository('CimetiereBundle:Cimetiere')->findOneBy(array('nomCimetiere' => $id));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cimetiere entity.');
        } else {
            $entities = $entity->getConcessions();
        }
        return $this->render('CimetiereBundle:Carte:show.html.twig', array(
                    'entity' => $entity, 'entities'=>$entities));
    }

}


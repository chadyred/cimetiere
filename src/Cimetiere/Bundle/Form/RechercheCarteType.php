<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RechercheCarteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nomCimetiere', 'entity', array(
                    'class' => 'CimetiereBundle:Cimetiere',
                    'property' => 'nomCimetiere',
                    'multiple' => false,
                    'required' => false,
                    'empty_data' => null, 'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('c')->orderBy('c.nomCimetiere', 'ASC');
                    },
                    'attr' => array('class' => 'col-sm-12')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\RechercheCarte'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'cimetiere_bundle_recherchecarte';
    }

}

<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcessionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeGestionConcession','text',array('required'=>false))
            ->add('nature','text',array('required'=>false))
            ->add('typeConcession','text',array('required'=>false))
            ->add('nbPlaces','text',array('required'=>false))
            ->add('dateEcheance')
            ->add('dateDerniereAcquisition')
            ->add('duree','text',array('required'=>false))
            ->add('numeroTitreConcession','text',array('required'=>false))
            ->add('commentaire','text',array('required'=>false))
            ->add('coordX','text',array('required'=>false))
            ->add('coordY','text',array('required'=>false))
            ->add('angle','text',array('required'=>false))
            ->add('prix','text',array('required'=>false))
            ->add('url','text',array('required'=>false))
            ->add('hauteur','text',array('required'=>false))
            ->add('largeur','text',array('required'=>false))
            ->add('cimetiere')
            ->add('concessionaires')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\Concession'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cimetiere_bundle_concession';
    }
}

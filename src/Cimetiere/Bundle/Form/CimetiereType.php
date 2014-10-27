<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CimetiereType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeCimetiere','text',array('required'=>false))
            ->add('nomCimetiere','text',array('required'=>false))
            ->add('url','text',array('required'=>false))
            ->add('ville')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\Cimetiere',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cimetiere_bundle_cimetiere';
    }
}

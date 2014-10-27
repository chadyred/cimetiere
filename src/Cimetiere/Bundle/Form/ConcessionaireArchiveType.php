<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcessionaireArchiveType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('nomPrenom')
            ->add('nomJF')
            ->add('cp')
            ->add('ville')
            ->add('adresse1')
            ->add('adresse2')
            ->add('codeGestionConcession')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\ConcessionaireArchive'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cimetiere_bundle_concessionairearchive';
    }
}

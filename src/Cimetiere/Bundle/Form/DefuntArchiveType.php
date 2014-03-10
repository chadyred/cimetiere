<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DefuntArchiveType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeGestionConcession')
            ->add('numeroOrdre')
            ->add('nomPrenom')
            ->add('nomJF')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('dateDeces')
            ->add('lieuDeces')
            ->add('dateHinumation')
            ->add('dateExumation')
            ->add('dateReduction')
            ->add('enveloppeFuneraire')
            ->add('entrepriseFuneraire')
            ->add('marbrier')
            ->add('oppositionCremation')
            ->add('commentaire')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\DefuntArchive'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cimetiere_bundle_defuntarchive';
    }
}

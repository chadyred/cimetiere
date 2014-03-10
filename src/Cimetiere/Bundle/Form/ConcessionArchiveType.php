<?php

namespace Cimetiere\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcessionArchiveType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeCimetiere')
            ->add('codeGestionConcession')
            ->add('nature')
            ->add('typeConcession')
            ->add('nbPlaces')
            ->add('dateEcheance')
            ->add('dateDerniereAcquisition')
            ->add('duree')
            ->add('numeroTitreConcession')
            ->add('commentaire')
            ->add('coordX')
            ->add('coordY')
            ->add('angle')
            ->add('url')
            ->add('hauteur')
            ->add('largeur')
            ->add('prix')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cimetiere\Bundle\Entity\ConcessionArchive'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cimetiere_bundle_concessionarchive';
    }
}

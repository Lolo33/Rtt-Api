<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('membrePseudo')
            ->add('membrePass')
            ->add('membreTel')
            ->add('membreMail')
            ->add('membreOrga')
            ->add('membreDateInscription')
            ->add('membreDerniereConnexion')
            ->add('membreIpInscription')
            ->add('membreIpDerniereConnexion')
            ->add('membreCodeValidation')
            ->add('membreValidation')
            ->add('membreDptCode');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membres',
            'csrf_protection' => false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_membres';
    }


}

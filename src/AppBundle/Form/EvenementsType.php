<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('eventTitre')
            ->add('eventNbEquipes')
            ->add('eventJoueursMax')
            ->add('eventJoueursMin')
            ->add('eventPaiement')
            ->add('eventTarif')
            ->add('eventPrive')
            ->add('eventPass')
            ->add('eventTarificationEquipe')
            ->add('eventOrga')
            ->add('eventOrga2')
            ->add('eventImg')
            ->add('eventDescriptif')
            ->add('eventTournoi')
            ->add('eventLieu')
            ->add('eventCompte')
            ->add('eventMango');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evenements',
            'csrf_protection' => false,
            'allow_extra_fields' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evenements';
    }


}

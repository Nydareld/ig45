<?php

namespace AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateEvt')
                ->add('heureDebut')
                ->add('heureFin')
                ->add('typeIntervention')
                ->add('niveau_classe')
                ->add('nbEleves')
                ->add('nbParticipants')
                ->add('intervenants')
                ->add('nbObservateurs')
                ->add('observateurs')
                ->add('lieu');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AgendaBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'agendabundle_evenement';
    }


}

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
        $builder->add('nom')
                ->add('description')
                ->add('dateEvt')
                ->add('heureDebut')
                ->add('heureFin')
                ->add('nbParticipants')
                ->add('nbObservateurs')
                ->add('niveauIntervention')
                ->add('typeIntervention')
                ->add('have_observateur')
                ->add('correspondant')
                ->add('lieu')->add('status')
                ->add('intervenants')
                ->add('observateurs')
                ->add('type');
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

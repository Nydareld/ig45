<?php

namespace AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateEvt', DateType::class, array(
                        'widget' => 'choice',
                        // this is actually the default format for single_text
                        'format' => 'dd-MM-yyyy',
                        'data' => new \DateTime()
                    )
                  )

                ->add('etablissement')
                ->add('heureDebut',  TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                  )
                )
                ->add('heureFin', TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                  )
                )
                ->add('nbEleves')
                ->add('nbParticipants', ChoiceType::class, array(
                    'choices'  => array(
                        'Aucun' => 0,
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                        '7' => 7,
                        '8' => 8,
                    ),
                  )
                )
                ->add('intervenants')
                ->add('nbObservateurs', ChoiceType::class, array(
                    'choices'  => array(
                        'Aucun' => 0,
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                        '7' => 7,
                        '8' => 8,
                    ),
                  )
                )
                ->add('observateurs');

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

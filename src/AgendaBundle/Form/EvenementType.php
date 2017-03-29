<?php

namespace AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
                        'data' => new \DateTime(),
                    )
                  )
                ->add('anneeScolaire')
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
                ->add('niveauClasse',TextType::class, array(
                    'attr' => array(
                      'placeholder' => 'Ex : CM2',
                    ),
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
                        '9' => 10,
                        '10' => 10,
                        '11' => 11,
                        '12' => 12,
                        '13' => 13,
                        '14' => 14,
                        '15' => 15,
                        '16' => 16,
                        '17' => 17,
                        '18' => 18,
                        '19' => 19,
                        '20' => 20,
                        '21' => 21,
                        '22' => 22,
                        '23' => 23,
                        '24' => 24,
                        '25' => 25,
                        '26' => 26,
                        '27' => 27,
                        '28' => 28,
                        '29' => 29,
                        '30' => 30,
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

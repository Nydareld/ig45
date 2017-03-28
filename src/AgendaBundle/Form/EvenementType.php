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
                        'data' => new \DateTime(),
                        'required' => true
                    )
                  )
                ->add('anneeScolaire')
                ->add('etablissement', array('required' => true))
                ->add('heureDebut',  TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                      'required' => true
                  )
                )
                ->add('heureFin', TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice',
                      'required' => true
                  )
                )
                ->add('niveauClasse',array('placeholder' => 'ex : CM2', 'required' => true))
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
                    'required' => true
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
                    'required' => true
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

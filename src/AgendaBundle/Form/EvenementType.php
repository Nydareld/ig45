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
                        'data' => new \DateTime()
                    )
                  )
                ->add('anneeScolaire')
                ->add('etablissement')
                ->add('heureDebut',  TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice'
                  )
                )
                ->add('heureFin', TimeType::class, array(
                      'input'  => 'datetime',
                      'widget' => 'choice'
                  )
                )
                ->add('niveauClasse',TextType::class, array(
                    'attr' => array(
                      'placeholder' => 'Ex : CM2'
                    )
                  )
                )
                ->add('nbEleves')
                ->add('nbParticipants', ChoiceType::class, array(
                    'choices'  => array_merge(
                        array('Aucun' => 0),range(1,31)
                    )
                  )
                )
                ->add('intervenants')
                ->add('nbObservateurs', ChoiceType::class, array(
                  'choices'  => array_merge(
                      array('Aucun' => 0),range(1,9)
                  )
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

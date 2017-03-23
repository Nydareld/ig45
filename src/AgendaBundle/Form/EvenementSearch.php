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
                      'format' => 'dd-MM-yyyy',
                      'data' => new \DateTime()
                  )
                )

              ->add('lieu')
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
              ->add('niveauIntervention');
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

<?php

namespace AgendaBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\EntityRepository;


class EvenementSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateIntervention', DateType::class, array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'data' => new \DateTime(),
                    )
                )
                ->add('etablissement',EntityType::class,array(
                    'required' => false,
                    'placeholder' => "Choisir un etablissement",
                    'class' => 'AgendaBundle:Etablissement',
                    'label'=>'etablissement.fieldslabel.nom',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },

                ))
                ->add('niveau',EntityType::class,array(
                    'required' => false,
                    'placeholder' => "Choisir un niveau",
                    'class' => 'AgendaBundle:Niveau',
                    'label'=>'niveau.fieldslabel.nom',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },

                ))
                ->add('type',EntityType::class,array(
                    'required' => false,
                    'placeholder' => "Choisir un type d'intervention",
                    'class' => 'AgendaBundle:TypeEvenement',
                    'label'=>'typeEvenement.fieldslabel.nom',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },

                ))
                ->add('annee',EntityType::class,array(
                    'required' => false,
                    'placeholder' => "Choisir une année scolaire",
                    'class' => 'AgendaBundle:AnneeScolaire',
                    'label'=>'anneeScolaire.fieldslabel.annee',
                ))
                ->add('complet', CheckboxType::class, array('mapped' => false, 'required' => false, 'label'    => 'interventions non complétes'));
    }
}

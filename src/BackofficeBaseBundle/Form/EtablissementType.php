<?php

namespace BackofficeBaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array(
                'label'=>'etablissement.fieldslabel.nom',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('adresse',TextType::class,array(
                'label'=>'etablissement.fieldslabel.adresse',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('ville',TextType::class,array(
                'label'=>'etablissement.fieldslabel.ville',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('codePostal',IntegerType::class,array(
                'attr' => array('min' => 0,'max' => 99999),
                'label'=>'etablissement.fieldslabel.codePostal',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('correspondants',EntityType::class,array(
                'class' => 'UserBundle:User',
                'label'=>'etablissement.fieldslabel.correspondants',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('adjoints', EntityType::class, array(
                'class' => 'UserBundle:User',
                'multiple' => true,
                'label'=>'etablissement.fieldslabel.adjoints',
                'translation_domain' => 'AgendaBundle'
            ))
            ->add('niveaux', EntityType::class,array(
                'class' => 'AgendaBundle:Niveau',
                'multiple' => true,
                'label'=>'etablissement.fieldslabel.etablissement',
                'translation_domain' => 'AgendaBundle'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AgendaBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'agendabundle_etablissement';
    }


}

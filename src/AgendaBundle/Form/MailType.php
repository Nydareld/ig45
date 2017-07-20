<?php

namespace AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MailType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('objet',TextType::class,array(
            'label'=>'Objet'
        ))
        ->add('expediteur',TextType::class,array(
            'label'=>'Expediteur',
            'disabled' => true
        ))
        ->add('destinataire',TextType::class,array(
            'label'=>'Destinataire',
            'disabled' => true
        ))
        ->add('message',TextareaType::class,array(
            'label'=>'Message'
        ))
        ->add('save', SubmitType::class, array(
            'label' => 'Envoyer'
        ));
    }
}

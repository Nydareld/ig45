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
        $builder->add('description')->add('dateEvt')->add('heureDebut')->add('heureFin')->add('nbParticipants')->add('nbObservateurs')->add('niveauIntervention')->add('finale_intervention')->add('nbGroupes')->add('nbSalles')->add('eleves_volontaires')->add('documentation_attendue')->add('particularite')->add('complement_info')->add('enseignant_ref')->add('courriel_enseignant_ref')->add('tel_enseignant_ref')->add('nbEleves')->add('niveau_classe')->add('typeIntervention')->add('lieu')->add('statut')->add('intervenants')->add('observateurs');
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

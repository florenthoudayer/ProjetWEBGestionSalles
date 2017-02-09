<?php

namespace GestionSalleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut', DateType::class, array('widget' => 'single_text',
                        'label' => 'Date de début' ,'required' => true, 'html5' => false,
                        'attr' => ['class' => 'js-datepicker']))
                ->add('dateFin', DateType::class, array('widget' => 'single_text',
                        'label' => 'Date de début' ,'required' => true, 'html5' => false,
                        'attr' => ['class' => 'js-datepicker']))
                ->add('idUtilisateur')
                ->add('idSalles', null, array('label' => 'id salle' ,'required' => true))
                ->add('idMatiere', null, array('label' => 'id matiere' ,'required' => true))
                ->add('idFormation', null, array('label' => 'id formation' ,'required' => true));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionSalleBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionsallebundle_reservation';
    }


}

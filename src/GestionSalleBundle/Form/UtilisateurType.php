<?php

namespace GestionSalleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', null, array('label' => 'Nom' ,'required' => true))
                ->add('prenom', null, array('label' => 'Prenom' ,'required' => true))
                ->add('mdp', null, array('label' => 'Mot de passe' ,'required' => true))
                ->add('actif')
                ->add('idFormation', null, array('label' => 'id formation' ,'required' => true))
                ->add('idTitre', null, array('label' => 'id titre' ,'required' => true))
                ->add('idMatiere')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionSalleBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionsallebundle_utilisateur';
    }


}

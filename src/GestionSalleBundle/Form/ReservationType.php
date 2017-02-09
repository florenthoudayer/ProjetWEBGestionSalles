<<<<<<< HEAD
<?php

namespace GestionSalleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut')->add('dateFin')->add('idUser')->add('idSalles')->add('idMatiere')->add('idFormation')        ;
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
=======
<?php

namespace GestionSalleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut', null, array('label' => 'Date de début' ,'required' => true))
                ->add('dateFin', null, array('label' => 'Date de fin' ,'required' => true))
                ->add('idUtilisateur')
                ->add('idSalles', null, array('label' => 'id salle' ,'required' => true))
                ->add('idMatiere', null, array('label' => 'id matiere' ,'required' => true))
                ->add('idFormation', null, array('label' => 'id formation' ,'required' => true))        ;
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
>>>>>>> origin/master

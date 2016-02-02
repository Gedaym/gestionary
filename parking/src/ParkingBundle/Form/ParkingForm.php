<?php

namespace ParkingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ParkingForm extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
                ->add('numberStreet')
                ->add('street')
                ->add('city')
                ->add('postalCode')
                ->add('description')
                ->add('save', SubmitType::class, array('label' => 'Modifier'));
    }
    
    public function getName() {
        return 'parking';
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ParkingBundle\Entity\Parking'
        ));
    }

}

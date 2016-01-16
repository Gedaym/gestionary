<?php

namespace ParkingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('number_reservation')
                ->add('price')
                ->add('nb_spaces')
                ->add('date_start')
                ->add('date_end')
                ->add('price')
                ->add('customer_id', EntityType::class, array(
                    'class' => 'ParkingBundle:Customer',
                    'choice_label' => 'immatriculation'))
                ->add('parking_id', EntityType::class, array(
                    'class' => 'ParkingBundle:Parking',
                    'choice_label' => 'name'));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ParkingBundle\Entity\Reservation'
        ));
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: adnan_cfr2gd1
 * Date: 15/10/2018
 * Time: 03:03
 */

namespace App\Form;

use App\Entity\Flight;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure', TextType::class, array('label' => false))
            ->add('arrival', TextType::class, array('label' => false))
            ->add('departureDate', DateType::class, array('label' => false))
            ->add('arrivalDate', DateType::class, array('label' => false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Flight::class,
        ));
    }
}
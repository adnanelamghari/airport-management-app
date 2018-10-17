<?php
/**
 * Created by PhpStorm.
 * User: adnan_cfr2gd1
 * Date: 15/10/2018
 * Time: 03:03
 */

namespace App\Form;

use App\Entity\Airplane;
use App\Entity\Flight;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $pilotsRepository = $this->em->getRepository(User::class);
        $pilots = $pilotsRepository->findAll();
        $airplanesRepository = $this->em->getRepository(Airplane::class);
        $airplanes = $airplanesRepository->findAll();
        $builder
            ->add('departure', TextType::class, array('label' => false))
            ->add('arrival', TextType::class, array('label' => false))
            ->add('departureDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ]
            ])
            ->add('arrivalDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'data-provide' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy'
                ]
            ])
            ->add('pilote', EntityType::class, array(
                'required' => true,
                'label' => false,
                'placeholder' => 'Selectionner un pilote',
                'class' => User::class,
                'choices' => $pilots,
                'choice_label' => function ($pilot) {
                    return $pilot->getName();
                },
                'attr' => [
                    'class' => 'form-control',
                ]
            ))
            ->add('airplane', EntityType::class, array(
                'required' => true,
                'label' => false,
                'placeholder' => 'Selectionner une avion',
                'class' => Airplane::class,
                'choices' => $airplanes,
                'choice_label' => function ($airplane) {
                    return $airplane->getName();
                },
                'attr' => [
                    'class' => 'form-control',
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Flight::class,
        ));
    }
}
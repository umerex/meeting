<?php

// src/Form/TimeSlotType.php
namespace App\Form;

#use App\Entity\TimeSlot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeSlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('startTime', TimeType::class, [
                'widget' => 'single_text'
            ])
            ->add('endTime', TimeType::class, [
                'widget' => 'single_text'
            ])
            ->add('isAvailable', CheckboxType::class, [
                'label' => 'Available?',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            #   'data_class' => TimeSlot::class,
        ]);
    }
}


<?php

namespace App\Form;

use App\Entity\AvoirClientsHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvoirClientsHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('modepaimement')
            ->add('numerocompte')
            ->add('codeclient')
            ->add('codefacture')
            ->add('montanttotalfacture')
            ->add('montantsaisie')
            ->add('ancienmontant')
            ->add('payetawa')
            ->add('restantmazal')
            ->add('datemontant')
            ->add('creepar')
            ->add('datecreation', null, [
                'widget' => 'single_text',
            ])
            ->add('datemodification', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AvoirClientsHistory::class,
        ]);
    }
}

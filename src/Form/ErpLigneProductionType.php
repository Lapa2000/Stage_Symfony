<?php

namespace App\Form;

use App\Entity\ErpLigneProduction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpLigneProductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('codeligne')
            ->add('refproduit')
            ->add('ancienqte')
            ->add('newqte')
            ->add('sortie')
            ->add('restant')
            ->add('dateligne')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ErpLigneProduction::class,
        ]);
    }
}

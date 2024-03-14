<?php

namespace App\Form;

use App\Entity\ErpMouvementStock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpMouvementStockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('codeproduit')
            ->add('ancienqte')
            ->add('newquantitetonne')
            ->add('newquantitequnto')
            ->add('newquantitekilo')
            ->add('newvalue')
            ->add('date')
            ->add('type')
            ->add('creepar')
            ->add('datecreation')
            ->add('datemodification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ErpMouvementStock::class,
        ]);
    }
}

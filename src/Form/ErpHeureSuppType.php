<?php

namespace App\Form;

use App\Entity\ErpHeureSupp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpHeureSuppType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('titre')
            ->add('description')
            ->add('codeemployee')
            ->add('datedebut')
            ->add('datefin')
            ->add('categorie')
            ->add('etat')
            ->add('creepar')
            ->add('datecreation')
            ->add('datemodification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ErpHeureSupp::class,
        ]);
    }
}

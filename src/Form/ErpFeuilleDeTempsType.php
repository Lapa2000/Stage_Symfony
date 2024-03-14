<?php

namespace App\Form;

use App\Entity\ErpFeuilleDeTemps;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpFeuilleDeTempsType extends AbstractType
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
            ->add('datecreation', null, [
                'widget' => 'single_text',
            ])
            ->add('datemodification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ErpFeuilleDeTemps::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\ErpPistes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpPistesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('nom')
            ->add('prenom')
            ->add('societe')
            ->add('secteur')
            ->add('mobile')
            ->add('email')
            ->add('website')
            ->add('adresse')
            ->add('codepostal')
            ->add('pays')
            ->add('image')
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
            'data_class' => ErpPistes::class,
        ]);
    }
}

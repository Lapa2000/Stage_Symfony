<?php

namespace App\Form;

use App\Entity\Masociete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MasocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('nom')
            ->add('adresse')
            ->add('tel')
            ->add('fax')
            ->add('mobile')
            ->add('codefinance')
            ->add('codebancaire')
            ->add('email')
            ->add('website')
            ->add('logo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Masociete::class,
        ]);
    }
}

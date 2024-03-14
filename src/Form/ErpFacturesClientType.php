<?php

namespace App\Form;

use App\Entity\ErpFacturesClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpFacturesClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('monlogo')
            ->add('masociete')
            ->add('monadresse')
            ->add('montel')
            ->add('nomclient')
            ->add('adresse')
            ->add('telclient')
            ->add('codedevis')
            ->add('datedevis')
            ->add('totalht')
            ->add('totaltva')
            ->add('totalttc')
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
            'data_class' => ErpFacturesClient::class,
        ]);
    }
}

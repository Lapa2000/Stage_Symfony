<?php

namespace App\Form;

use App\Entity\CommandeClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('codedevis')
            ->add('masociete')
            ->add('monadresse')
            ->add('montel')
            ->add('monfax')
            ->add('monregistre')
            ->add('monmatricule')
            ->add('clientcode')
            ->add('clientraison')
            ->add('clientnom')
            ->add('clientprenom')
            ->add('clientel')
            ->add('clientfax')
            ->add('clientadresse')
            ->add('clientmatricule')
            ->add('totalht')
            ->add('tva')
            ->add('totaltva')
            ->add('remises')
            ->add('timbres')
            ->add('totalttc')
            ->add('chauffeurnom')
            ->add('chauffeurvehicule')
            ->add('creationcode')
            ->add('creationnom')
            ->add('creationprenom')
            ->add('creationdate')
            ->add('creationheure')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommandeClient::class,
        ]);
    }
}

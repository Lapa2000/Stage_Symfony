<?php

namespace App\Form;

use App\Entity\ErpDevisClientNewFromFactures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpDevisClientNewFromFacturesType extends AbstractType
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
            ->add('clienttel')
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
            ->add('modepaimement')
            ->add('numbercompte')
            ->add('montantsaisie')
            ->add('accomptesaisie')
            ->add('etatfacture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ErpDevisClientNewFromFactures::class,
        ]);
    }
}

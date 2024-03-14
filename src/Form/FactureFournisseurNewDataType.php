<?php

namespace App\Form;

use App\Entity\FactureFournisseurNewData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactureFournisseurNewDataType extends AbstractType
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
            'data_class' => FactureFournisseurNewData::class,
        ]);
    }
}

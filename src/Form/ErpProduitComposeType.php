<?php

namespace App\Form;

use App\Entity\ErpProduitCompose;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpProduitComposeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('codeproduit')
            ->add('image')
            ->add('nom')
            ->add('description')
            ->add('type')
            ->add('categorie')
            ->add('methodeapprovisionement')
            ->add('prixachatht')
            ->add('prixventeht')
            ->add('unitestock')
            ->add('fournisseur')
            ->add('dateachat', null, [
                'widget' => 'single_text',
            ])
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
            'data_class' => ErpProduitCompose::class,
        ]);
    }
}

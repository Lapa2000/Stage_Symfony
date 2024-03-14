<?php

namespace App\Form;

use App\Entity\ErpMatierePremiere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpMatierePremiereType extends AbstractType
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
            ->add('puvht')
            ->add('tva')
            ->add('puvttc')
            ->add('remisemax')
            ->add('unitestock')
            ->add('fournisseur')
            ->add('dateachat', null, [
                'widget' => 'single_text',
            ])
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
            'data_class' => ErpMatierePremiere::class,
        ]);
    }
}

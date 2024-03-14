<?php

namespace App\Form;

use App\Entity\LigneFacturesFournisseurss;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneFacturesFournisseurssType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('codedevis')
            ->add('reference')
            ->add('produit')
            ->add('quantite')
            ->add('prixdeventeht')
            ->add('remise')
            ->add('tva')
            ->add('soustotalht')
            ->add('soustotalttc')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LigneFacturesFournisseurss::class,
        ]);
    }
}

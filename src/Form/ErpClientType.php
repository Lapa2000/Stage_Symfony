<?php

namespace App\Form;

use App\Entity\ErpClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('anciencode')
            ->add('typearrive')
            ->add('surnom')
            ->add('prenomdeux')
            ->add('pays')
            ->add('ville')
            ->add('codepostal')
            ->add('raisonsocial')
            ->add('registrecommerce')
            ->add('matriculefiscal')
            ->add('rib')
            ->add('intervenanttype')
            ->add('intervenantnom')
            ->add('cin')
            ->add('cheque')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('tel')
            ->add('tel2')
            ->add('fax')
            ->add('email')
            ->add('website')
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
            'data_class' => ErpClient::class,
        ]);
    }
}

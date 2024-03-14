<?php

namespace App\Form;

use App\Entity\ErpEmploye;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpEmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('tel')
            ->add('tel2')
            ->add('fax')
            ->add('email')
            ->add('website')
            ->add('image')
            ->add('login')
            ->add('motdepasse')
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
            'data_class' => ErpEmploye::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\ErpAdmin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('motdepasse')
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
            'data_class' => ErpAdmin::class,
        ]);
    }
}

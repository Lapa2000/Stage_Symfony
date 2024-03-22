<?php

namespace App\Form;

use App\Entity\ErpAdmin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NomType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SigninType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('code', IntegerType::class, [
            
            'label' => 'Code',
            'attr' => [
                'placeholder' => 'saisir votre Code.'
            ]
        ])
            
            ->add('nom', TextType::class, [
            
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'saisir votre Nom.'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'saisir votre Prenom.'
                ]
            ])

            ->add('email', EmailType::class, [
            
                'label' => 'E-mail',
                'attr' => [
                    'placeholder' => 'saisir votre e-mail.'
                ]
            ])
            ->add('motdepasse', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'saisir votre mot de passe.'
                ]
            ])
        
        ->add('submit', SubmitType::class, [

            'label' => 'Valider'
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

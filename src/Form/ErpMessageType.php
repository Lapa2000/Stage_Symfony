<?php

namespace App\Form;

use App\Entity\ErpMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ErpMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code')
            ->add('idenvoie')
            ->add('idreception')
            ->add('titre')
            ->add('texte')
            ->add('fichier')
            ->add('etat')
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
            'data_class' => ErpMessage::class,
        ]);
    }
}

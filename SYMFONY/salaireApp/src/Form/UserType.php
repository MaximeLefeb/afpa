<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('mail', EmailType::class, [
                'attr' => [
                    'class' => [
                        'form-control'
                    ]
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => [
                        'form-control'
                    ]
                ]
            ])
            ->add('prenom', TextType::class,[
                'attr' => [
                    'class' => [
                        'form-control'
                    ]
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => [
                        'form-control'
                    ]
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

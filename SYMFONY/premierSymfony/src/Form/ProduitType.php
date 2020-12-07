<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('designation', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Designation', 'class' => 'form-control mt-5']])
            ->add('prix', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Prix (€)', 'class' => 'form-control mt-5']])
            ->add('submit', SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'method' => 'post',
            'action' => '',
        ]);
    }
}

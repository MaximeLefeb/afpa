<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options):void {
        $builder
            ->add('name', TextType::class, [
                'label'    => "Intitulé de l'article",
                'required' => true,
                'attr'     => [
                    'class' => 'form-control w-100 text-center mb-3',
                ]
            ])
            ->add('description', TextareaType::class, [
                'label'    => "Description de l'article",
                'required' => true,
                'attr'     => [
                    'class' => 'form-control w-100 mb-3',
                    'style' => 'height: 100px'
                ]
            ])
            ->add('quantity', IntegerType::class, [
                'label'    => "Stock",
                'required' => true,
                'attr'     => [
                    'class' => 'form-control text-center mb-3',
                ]
            ])
            ->add('note', IntegerType::class, [
                'label'    => "Note",
                'required' => true,
                'attr'     => [
                    'class' => 'form-control text-center mb-3',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver):void {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Image as ConstraintsImage;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('place')
            ->add('date_time', null, [
                'widget' => 'single_text',
            ])
            ->add('content')
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'attr' => ['hidden' => 'true']
            ])
            ->add('attached_picture', FileType::class, [
                'multiple' => false,
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new ConstraintsImage([
                        'maxWidth' => 1920,
                        'maxWidthMessage' => 'Le format de l\'image ne doit pas dépasser {{ max_width }} pixels de large.'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
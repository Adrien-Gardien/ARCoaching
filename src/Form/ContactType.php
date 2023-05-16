<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'form-control tinymce my-3 bold',
                'placeholder' => 'Email',
            ],
            'label' => false,
            'required' => false,
            'row_attr' => [
                'id' => 'email-input-div', // Renommer l'ID du div
                'class' => 'email-input-div', // Renommer la classe du div
            ],
        ])
        ->add('content', TextareaType::class, [
            'attr' => [
                'class' => 'form-control tinymce my-3 bold',
                'placeholder' => 'Votre message',
            ],
            'label' => false,
            'required' => false,
            'row_attr' => [
                'id' => 'content-input-div', // Renommer l'ID du div
                'class' => 'content-input-div', // Renommer la classe du div
            ],
        ])
        ->add('Envoyer', SubmitType::class, [
            'attr' => ['class' => 'btn btn-danger btn-lg'],
            'row_attr' => [
                'id' => 'submit-button-div', // Renommer l'ID du div
                'class' => 'submit-button-div', // Renommer la classe du div
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

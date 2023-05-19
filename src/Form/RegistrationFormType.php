<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    "class" => 'w-100 my-3 bold',
                    "placeholder" => "Email",
                ],
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'id' => 'email-input-div', // Renommer l'ID du div
                    'class' => 'email-input-div', // Renommer la classe du div
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'attr' => [
                    "class" => ' w-100 my-3 bold',
                    "placeholder" => "Mot de passe",
                    'autocomplete' => 'new-password',
                ],
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'id' => 'password-input-div', // Renommer l'ID du div
                    'class' => 'password-input-div', // Renommer la classe du div
                ],
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                // 'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

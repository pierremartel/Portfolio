<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'contact.page.name',
            ],
                'label' => false,
                'required' => false

            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email'
                ],
                'label' => false,
                'required' => false
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'placeholder' => 'contact.page.company'
                ],
                'label' => false,
                'required' => false
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Message',
                    'rows' => 10,
                    // 'cols' => 30
                ],
                'label' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Contact::class,
            'translation_domain' => 'contact_content'
        ]);
    }
}

<?php

namespace App\Infrastructure\Form\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $nombre = 'Nombre por defecto';
        $builder
            ->add('name', TextType::class, array(
                'data' => $nombre))
            ->add('surname')
            ->add('birthDate', DateType::class,
                [
                    'widget' => 'choice',
                    'format' => 'dd MM yyyy',
                    'years' => range(1918, 2018)
                ]
            )
            ->add('nickname')
            ->add('email')
            ->add('password')
            ->add(
                'save',
                SubmitType::class
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserClass::class
        ]);
    }
}

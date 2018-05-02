<?php

namespace App\Infrastructure\Form;

use App\Domain\Model\Entity\User\User;
use Symfony\Component\Form\AbstractType;
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
            ->add('apellidos')
            ->add('fecha_nacimiento')
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
            'data_class' => User::class,
        ]);
    }
}

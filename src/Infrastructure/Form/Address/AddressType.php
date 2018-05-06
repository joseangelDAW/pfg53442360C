<?php

namespace App\Infrastructure\Form\Address;

use App\Domain\Model\Entity\Address\AddressClass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street')
            ->add('number')
            ->add('floor')
            ->add('floorInformation')
            ->add('cp')
            ->add('province')
            ->add('city')
            ->add(
                'save',
                SubmitType::class
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressClass::class
        ]);
    }
}
<?php
namespace App\Unit\ex04Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('name', TextType::class, ['required' => false])
            ->add('address', TextType::class, ['required' => false])
            ->add('email', EmailType::class)
            ->add('enable', CheckboxType::class, ['required' => false])
            ->add('birthday', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create new user'])
        ;
    }
}
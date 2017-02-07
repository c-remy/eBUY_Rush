<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('postalAddress');
        $builder->add('email', TextType::class, array('label' => 'Email'));
        $builder->add('username', TextType::class, array('label' => 'Username'));
        // $builder->add('password', PasswordType::class, array('label' => 'Password'));
        // $builder->add('passwordconfirmation', PasswordType::class, array('label' => 'Password confirmation'));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }


}

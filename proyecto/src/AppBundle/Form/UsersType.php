<?php
/**
 * Created by PhpStorm.
 * User: pjord
 * Date: 14/11/2018
 * Time: 18:43
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;



class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array(
                'label' => 'Nombre',
                'required' => true))
            ->add('apellido_1', TextType::class, array(
                'label' => 'Apellido 1',
                'required' => true))
            ->add('apellido_2', TextType::class, array(
                'label' => 'Apellido 2',
                'required' => true))
            ->add('usuario', TextType::class, array(
                'label' => 'Usuario',
                'required' => true))
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => ['label' => 'Contraseña'],
                'second_options' => ['label' => 'Repetir contraseña'],
            ])
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'required' => true))
            ->add('telefono', IntegerType::class, array(
                'label' => 'Telefono',
                'required' => true))
            ->add('enviar', SubmitType::class, array('label'=>'Enviar'));
        ;
    }
}

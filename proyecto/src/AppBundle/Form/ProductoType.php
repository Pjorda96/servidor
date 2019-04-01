<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 29/10/2018
 * Time: 7:05
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('cantidad')
            ->add('descripcion')
            ->add('Enviar', SubmitType::class)
        ;
    }
}
<?php 
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class RegisterType extends AbstractType {

  /**
   * Contruye el formulario
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('name', TextType::class, array(
      'label' => 'Nombre',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('surname', TextType::class, array(
      'label' => 'Apellidos',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('email', EmailType::class, array(
      'label' => 'Correo electrónico',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('password', PasswordType::class, array(
      'label' => 'Contraseña',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control'),
    ));
    $builder->add('submit', SubmitType::class, array(
      'label' => 'Registrar',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'btn btn-success'),
    ));
  }
}
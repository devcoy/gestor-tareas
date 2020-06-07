<?php 
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class TasksType extends AbstractType {

  /**
   * Contruye el formulario
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('title', TextType::class, array(
      'label' => 'Título',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('content', TextareaType::class, array(
      'label' => 'Descripción',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('priority', ChoiceType::class, array(
      'label' => 'Prioridad',
      'choices' => array(
        'Alta' => 'hight',
        'Media' => 'medium',
        'Baja' => 'low'
      ),
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control')
    ));
    $builder->add('hours', TextType::class, array(
      'label' => 'Horas estimadas',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'form-control'),
    ));
    $builder->add('submit', SubmitType::class, array(
      'label' => 'Agregar',
      'row_attr' => array('class' => 'form-group'),
      'attr' => array('class' => 'btn btn-success'),
    ));
  }
}
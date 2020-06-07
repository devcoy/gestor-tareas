<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
  /**
   * Listar todas las tareas
   */
  public function index()
  {
    // Test de entidades y relaciones
    $em = $this->getDoctrine()->getManager();
    $task_repo = $this->getDoctrine()->getRepository(Task::class);
    $tasks = $task_repo->findAll();

    return $this->render('task/index.html.twig', [
      'tasks' => $tasks
    ]);
  }

  /**
   * Ver una tarea en particular
   */
  public function detail(Task $task)
  {
    if (!$task) {
      return $this->redirectToRoute('task', array(
        'message' => 'La tarea no existe'
      ));
    }
    return $this->render('task/detail.html.twig', array(
      'task' => $task
    ));
  }
}

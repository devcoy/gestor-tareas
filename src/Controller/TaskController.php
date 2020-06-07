<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;
use App\Form\TasksType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

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

  /**
   * Crear tarea
   */
  public function create(Request $request, UserInterface $user)
  {
    $task = new Task();
    $form = $this->createForm(TasksType::class, $task);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $task->setCreatedAt(new DateTime('now'));
      $task->setUser($user);
      //var_dump($task);
      $em = $this->getDoctrine()->getManager();
      $em->persist($task);
      $em->flush();

      return $this->redirect(
        $this->generateUrl('detail_task', array('id' => $task->getId()))
      );
    }
    return $this->render('task/create.html.twig', array(
      'form' => $form->createView()
    ));
  }

  /**
   * Listar solo mis tareas
   */
  public function myTasks(UserInterface $user) {
    $my_tasks = $user->getTasks();

    return $this->render('task/my-tasks.html.twig', array(
      'my_tasks' => $my_tasks
    ));
  }
}

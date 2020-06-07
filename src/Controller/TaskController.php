<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
  public function index()
  {
    // Test de entidades y relaciones
    $em = $this->getDoctrine()->getManager();
    $task_repo = $this->getDoctrine()->getRepository(Task::class);
    $tasks = $task_repo->findAll();
    
    /*foreach ($tasks as $task) {
      echo $task->getTitle();
      echo $task->getUser()->getEmail() . '<hr/>';
    }

    $user_repo = $this->getDoctrine()->getRepository(User::class);
    $users = $user_repo->findAll();
    foreach ($users as $user) {
      echo '<h1>' . $user->getName() . '</h1> <br/>';
      $tasks = $user->getTasks();
      foreach ($tasks as $task) {
        echo $task->getTitle();
      }
      echo '<hr/>';
    } */

    return $this->render('task/index.html.twig', [
      'tasks' => $tasks
    ]);
  }
}

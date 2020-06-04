<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegisterType;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
  public function userRegister(Request $request, UserPasswordEncoderInterface $encoder)
  {
    // Crear el formulario
    $user = new User();
    $form = $this->createForm(RegisterType::class, $user);

    // Unimos lo que envía la request del formulario con el objeto
    $form->handleRequest($request);

    // Comprobamos si se envía el formulario
    if ($form->isSubmitted()) {
      // var_dump($user);
      $user->setRole('ROLE_USER');
      $user->setCreatedAt(new \DateTime('now'));
      // Cifrar password
      $encoded = $encoder->encodePassword($user, $user->getPassword());
      $user->setPassword($encoded);
    
      // Guardar usuario
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      return $this->redirectToRoute('tasks');
    }
    return $this->render('user/register.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}

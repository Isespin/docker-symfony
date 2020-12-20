<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends AbstractController
{
  private $tokenManager;

  public function __construct(CsrfTokenManagerInterface $tokenManager = null)
  {
      $this->tokenManager = $tokenManager;
  }
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
      $error = $authenticationUtils->getLastAuthenticationError();

      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('login.html.twig', [
          'last_username' => $lastUsername,
          'error' => $error,
      ]);
    }

    /**
     * @Route("/protected/", name="protected")
     */
    public function protected()
    {
        return $this->render('default/protected.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}

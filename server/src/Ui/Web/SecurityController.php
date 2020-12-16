<?php

declare(strict_types=1);

namespace App\Ui\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class SecurityController extends AbstractController
{
    private AuthenticationUtils $authenticationUtils;

    public function __construct(AuthenticationUtils $authenticationUtils)
    {
        $this->authenticationUtils = $authenticationUtils;
    }

    /**
     * @Route(
     *     "/identity/sign-in",
     *      name="app_login",
     *      methods={"GET", "POST"}
     * )
     */
    public function login()
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $this->authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $this->authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/identity/sign-out", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('
            This method can be blank - it will be intercepted by the logout key
            on your firewall.
        ');
    }

    /**
     * @Route(
     *     "/identity/me",
     *     name="app_me",
     *     methods={"GET"}
     * )
     */
    public function me()
    {
        return new JsonResponse([
            'username' => $this->getUser()->getUsername(),
        ]);
    }
}

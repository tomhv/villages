<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Home
{
    /**
     * @Route(
     *     "/",
     *      name="app_home",
     *      methods={"GET"}
     * )
     */
    public function __invoke()
    {
        return new JsonResponse([
            'message' => 'Welcome to Villages!',
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Ui\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetVillages
{
    /**
     * @Route(
     *     "/villages",
     *      name="app_ui_api_getvillages",
     *      methods={"GET"}
     * )
     */
    public function __invoke()
    {
        return new JsonResponse([
            [
                'id' => '2c3ad882-e987-462f-8965-75a42ad603fa',
                'name' => 'Elmhaven',
                'population' => 345,
            ],
            [
                'id' => '216b01fa-8383-4163-82df-a0497aafcedc',
                'name' => 'Sparrow\'s Edge',
                'population' => 12,
            ],
            [
                'id' => '5e6502bb-de06-43c5-b980-c1194285d5db',
                'name' => 'Highside',
                'population' => 3,
            ],
            [
                'id' => 'c13600dc-5872-4ace-ae77-8b8dced0f8ce',
                'name' => 'Hemlockwood',
                'population' => 1,
            ]
        ]);
    }
}

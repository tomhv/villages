<?php

declare(strict_types=1);

namespace App\Ui\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetVillages extends AbstractController
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
        $villages = [
            [
                'id' => '2c3ad882-e987-462f-8965-75a42ad603fa',
                'name' => 'Elmhaven',
                'population' => rand(1, 350),
            ],
            [
                'id' => '216b01fa-8383-4163-82df-a0497aafcedc',
                'name' => 'Sparrow\'s Edge',
                'population' => rand(1, 350),
            ],
            [
                'id' => '5e6502bb-de06-43c5-b980-c1194285d5db',
                'name' => 'Highside',
                'population' => rand(1, 350),
            ],
            [
                'id' => '0fe87112-2436-4841-bf29-fdf1782c99d4',
                'name' => 'Fair Shipham',
                'population' => rand(1, 350),
            ],
            [
                'id' => 'c13600dc-5872-4ace-ae77-8b8dced0f8ce',
                'name' => 'Hemlockwood',
                'population' => rand(1, 350),
            ],
        ];

        usort($villages, function ($a, $b) {
            if ($a['population'] == $b['population']) {
                return 0;
            }

            return ($a['population'] < $b['population']) ? 1 : -1;
        });

        return new JsonResponse($villages);
    }
}

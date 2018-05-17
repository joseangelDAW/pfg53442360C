<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 16/05/18
 * Time: 20:01
 */

namespace App\Infrastructure\Controller;

use App\Application\Pet\InsertPet\InsertPet;
use App\Application\Pet\InsertPet\InsertPetCommand;
use App\Application\Pet\UpdatePet\UpdatePet;
use App\Application\Pet\UpdatePet\UpdatePetCommand;
use App\Infrastructure\Service\ReactRequestTransform;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PetController
{
    /**
     * @param Request $request
     * @param InsertPet $insertPet
     * @param ReactRequestTransform $reactRequestTransform
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function insertPet(
        Request $request,
        InsertPet $insertPet,
        ReactRequestTransform $reactRequestTransform
    ) {
        $item = $reactRequestTransform->transform($request);

        $output = $insertPet->handle(
            new InsertPetCommand(
                $item['name'],
                $item['race'],
                $item['userId'],
                $item['birthDate']
            )
        );
        return new JsonResponse($output['data'], $output['code']);
    }

    /**
     * @param Request               $request
     * @param UpdatePet             $updatePet
     * @param ReactRequestTransform $reactRequestTransform
     *
     * @return JsonResponse
     */
    public function updatePet(
        Request $request,
        UpdatePet $updatePet,
        ReactRequestTransform $reactRequestTransform
    ) {
        $item = $reactRequestTransform->transform($request);

        $output = $updatePet->handle(
            new UpdatePetCommand(
                $item['id'],
                $item['name'],
                $item['race'],
                $item['birthDate']
            )
        );
        return new JsonResponse($output['data'], $output['code']);
    }
}
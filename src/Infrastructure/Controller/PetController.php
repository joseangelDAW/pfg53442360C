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
use App\Application\Pet\ListPet\ListPet;
use App\Application\Pet\ListPet\ListPetCommand;
use App\Application\Pet\ListPetByKey\ListPetByKey;
use App\Application\Pet\ListPetByKey\ListPetByKeyCommand;
use App\Application\Pet\UpdatePet\UpdatePet;
use App\Application\Pet\UpdatePet\UpdatePetCommand;
use App\Infrastructure\Service\ReactRequestTransform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PetController extends Controller
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
     * @param ListPet $listPet
     * @return JsonResponse
     */
    public function listPet(
        ListPet $listPet
    ) {
        $output = $listPet->handle(new ListPetCommand());
        return $this->json($output);
    }

    /**
     * @param Request $request
     * @param UpdatePet $updatePet
     * @param ReactRequestTransform $reactRequestTransform
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
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

    /**
     * @param string $key
     * @param string $value
     * @param ListPetByKey $listPetByKey
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function listPetByKey(
        string $key,
        string $value,
        ListPetByKey $listPetByKey
    ) {
        $output = $listPetByKey->handle(new ListPetByKeyCommand($key, $value));
        return $this->json($output);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadImage(
        Request $request
    ) {
        $file = $request->getContent();

        $output = "/home/jose/pfg53442360c/image.jpg";
        $fp = fopen($output, 'w');
        fwrite($fp, $file);

        return new JsonResponse('Ok', '200');
    }
}
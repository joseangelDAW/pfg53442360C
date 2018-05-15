<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/05/18
 * Time: 19:07
 */

namespace App\Infrastructure\Controller;


use App\Application\Address\InsertAddress\InsertAddress;
use App\Application\Address\InsertAddress\InsertAddressCommand;
use App\Application\Address\ListAddress\ListAddress;
use App\Application\Address\ListAddress\ListAddressCommand;
use App\Application\Address\ListAddressByKey\ListAddressByKey;
use App\Application\Address\ListAddressByKey\ListAddressByKeyCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * @param Request       $request
     * @param InsertAddress $insertAddress
     *
     * @return JsonResponse
     */
    public function insertAddress(
        Request $request,
        InsertAddress $insertAddress
    ) {

        $arrayRequest = array(json_decode($request->getContent()));
        $item = [];

        foreach ($arrayRequest[0] as $key => $value) {
            $item[$key] = $value;
        }

        $output = $insertAddress->handle(
            new InsertAddressCommand(
                $item['street'],
                $item['number'],
                $item['userId'],
                $item['floor'],
                $item['floorInformation'],
                $item['province'],
                $item['city'],
                $item['cp']
            )
        );

        return $this->json(
            [
                $output
            ]
        );
    }

    public function listAddress(ListAddress $listAddress)
    {
        $output = $listAddress->handle(new ListAddressCommand());
        return $this->json($output);
    }

    /* Implementar */
    public function updateAddress()
    {

    }

    public function findAddressByKey(string $key, string $value, ListAddressByKey $listAddressByKey)
    {
        $output = $listAddressByKey->handle(new ListAddressByKeyCommand($key, $value));
        return $this->json($output);
    }
}
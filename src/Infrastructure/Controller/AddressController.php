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
     * @param Request $request
     * @param InsertAddress $insertAddress
     * @return JsonResponse
     * @throws \Assert\AssertionFailedException
     */
    public function insertAddress(
        Request $request,
        InsertAddress $insertAddress
    ) {

        $xxx = array(json_decode($request->getContent()));
        $x = $xxx[0];
        $arrOut = [];

        foreach ($x as $key => $value) {
            $arrOut [$key] = $value;
        }

        $output = $insertAddress->handle(
            new InsertAddressCommand(
                $arrOut['street'],
                $arrOut['number'],
                $arrOut['userId'],
                $arrOut['floor'],
                $arrOut['floorInformation'],
                $arrOut['province'],
                $arrOut['city'],
                $arrOut['cp']
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
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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * @param Request $request
     * @param InsertAddress $insertAddress
     * @return Response
     * @throws \Assert\AssertionFailedException
     */
    public function insertAddress (
        Request $request,
        InsertAddress $insertAddress
    )
    {

//        $output = $insertAddress->handle(
//            new InsertAddressCommand(
//                $request->request->get('street'),
//                $request->request->get('number'),
//                $request->request->get('userId'),
//                $request->request->get('floor'),
//                $request->request->get('floorInformation'),
//                $request->request->get('province'),
//                $request->request->get('city'),
//                $request->request->get('cp')
//            )
//        );

        $out = $request->getContent();


        return $this->json(
            [
                $out
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
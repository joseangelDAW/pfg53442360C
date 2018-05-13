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

class AddressController extends Controller
{
    public function insertAddress (
        string $street,
        string $number,
        int $userId,
        string $floor,
        string $floorInformation,
        string $province,
        string $city,
        string $cp,
        InsertAddress $insertAddress
    )
    {
        $output = $insertAddress->handle(
            new InsertAddressCommand(
                $street,
                $number,
                $userId,
                $floor,
                $floorInformation,
                $province,
                $city,
                $cp
            )
        );
        return $this->json([$output]);
    }

    public function listAddress(ListAddress $listAddress)
    {
        $output = $listAddress->handle(new ListAddressCommand());
        return $this->json($output);
    }

    public function findAddressByKey(string $key, string $value, ListAddressByKey $listAddressByKey)
    {
        $output = $listAddressByKey->handle(new ListAddressByKeyCommand($key, $value));
        return $this->json($output);
    }
}
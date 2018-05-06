<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/05/18
 * Time: 19:07
 */

namespace App\Infrastructure\Controller;


use App\Application\Address\InsertAddress\InsertAddress;
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
        $insertAddress->handle(
            $street,
            $number,
            $userId,
            $floor,
            $floorInformation,
            $province,
            $city,
            $cp
        );
        return $this->json(['Ok']);
    }
}
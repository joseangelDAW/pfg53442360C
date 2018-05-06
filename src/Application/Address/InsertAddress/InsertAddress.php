<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/05/18
 * Time: 18:51
 */

namespace App\Application\Address\InsertAddress;


use App\Domain\Model\Entity\Address\AddressRepositoryInterface;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use App\Infrastructure\Repository\Address\AddressRepository;
use App\Infrastructure\Repository\User\UserRepository;

class InsertAddress
{
    private $addressRepository;
    private $userRepository;

    public function __construct(
        AddressRepositoryInterface $addressRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->addressRepository = $addressRepository;
        $this->userRepository = $userRepository;
    }

    /*
        Falta hacer el command, crear la carpeta AddressRoutes y su archivo
        y separar controllers por carpetas
    */
    
    public function handle(
        string $street,
        string $number,
        int $userId,
        string $floor,
        string $floorInformation,
        string $province,
        string $city,
        string $cp
    )
    {
        $userEntity = $this->userRepository->findUserById($userId);
        $addressEntity = $this->addressRepository->insertAddress(
            $street,
            $number,
            $userEntity,
            $floor,
            $floorInformation,
            $province,
            $city,
            $cp
        );
        $this->addressRepository->persistAndFlush($addressEntity);
    }
}
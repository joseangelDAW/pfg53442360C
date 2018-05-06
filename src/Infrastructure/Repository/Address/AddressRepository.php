<?php

namespace App\Infrastructure\Repository\Address;

use App\Domain\Model\Entity\Address\Address;
use App\Domain\Model\Entity\Address\AddressRepositoryInterface;
use App\Domain\Model\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class AddressRepository extends ServiceEntityRepository implements AddressRepositoryInterface
{
    /**
     * @param string $street
     * @param string $number
     * @param User $user
     * @param string $floor
     * @param string $floorInformation
     * @param string $province
     * @param string $city
     * @param string $cp
     * @return Address|null
     */
    public function insertAddress(
        string $street,
        string $number,
        User $user,
        string $floor,
        string $floorInformation,
        string $province,
        string $city,
        string $cp
    ): ?Address {
        $address = new Address();
        $address->setStreet($street);
        $address->setNumber($number);
        $address->setUser($user);
        $address->setFloor($floor);
        $address->setFloorInformation($floorInformation);
        $address->setProvince($province);
        $address->setCity($city);
        $address->setCp($cp);

        return $address;
    }

    public function listAddress(): array
    {
        return $this->findAll();
    }

    public function updateUser(User $user, string $name):void
    {
    }

    public function findUserById(int $id): ?User
    {
        return $this->findOneBy(["id" => $id]);
    }

    public function persistAndFlush(Address $address): void
    {
        $this->getEntityManager()->persist($address);
        $this->getEntityManager()->flush();
    }
}
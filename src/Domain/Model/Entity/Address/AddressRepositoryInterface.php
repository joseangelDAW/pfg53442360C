<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 5/05/18
 * Time: 10:16
 */

namespace App\Domain\Model\Entity\Address;


use App\Domain\Model\Entity\User\User;

interface AddressRepositoryInterface
{
    public function insertAddress(
        string $street,
        string $number,
        User $user,
        string $floor,
        string $floorInformation,
        string $province,
        string $city,
        string $cp
    ): ?Address;


    public function listAddress(): array;

    public function updateUser(User $user, string $name):void;

    public function findUserById(int $id): ?User;

    public function findAddressByKey(string $key, string $value): array;

    public function persistAndFlush(Address $address): void;
}
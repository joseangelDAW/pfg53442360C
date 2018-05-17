<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 5/05/18
 * Time: 10:26
 */

namespace App\Domain\Model\Entity\Pet;


use App\Domain\Model\Entity\User\User;

interface PetRepositoryInterface
{
    /**
     * @param string $name
     * @param string $race
     * @param User $user
     * @param \DateTime $birthDate
     */
    public function insertPet(
        string $name,
        string $race,
        User $user,
        \DateTime $birthDate
    ): void;

    public function findPetById(int $id): ?Pet;

    public function updatePet(
        Pet $pet,
        string $name,
        string $race,
        \Datetime $birthDate
    ): void;

    public function persistAndFlush(Pet $pet): void;

}
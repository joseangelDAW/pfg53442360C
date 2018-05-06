<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/05/18
 * Time: 19:49
 */

namespace App\Domain\Model\Entity\User;

interface UserRepositoryInterface
{
    public function insertUser(
        string $name,
        string $apellidos,
        \DateTime $fechaNacimiento,
        string $nickName,
        string $password,
        string $email
    ): ?User;

    public function listUser(): array;

    public function updateUser(User $user, string $name): void;

    public function findUserById(int $id): ?User;

    public function persistAndFlush(User $user): void;
}
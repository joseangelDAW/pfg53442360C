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
    /**
     * @param string $name
     * @param string $apellidos
     * @param \DateTime $fechaNacimiento
     * @param string $nickName
     * @param string $password
     * @param string $email
     */
    public function insertUser(
        string $name,
        string $apellidos,
        \DateTime $fechaNacimiento,
        string $nickName,
        string $password,
        string $email
    ): void;

    public function listUser(): array;

    /**
     * @param User $user
     * @param string $name
     * @param string $surname
     * @param string $nickname
     * @param string $email
     */
    public function updateUser(
        User $user,
        string $name,
        string $surname,
        string $nickname,
        string $email
    ): void;

    public function findUserById(int $id): ?User;

    public function findUserByKey(string $key, string $value): array;

    public function getValueByKey(User $user, string $key): ?string;

    public function persistAndFlush(User $user): void;
}
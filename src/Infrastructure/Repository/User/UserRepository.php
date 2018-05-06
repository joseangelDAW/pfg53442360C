<?php

namespace App\Infrastructure\Repository\User;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function insertUser(
        string $name,
        string $surname,
        \DateTime $birthDate,
        string $nickName,
        string $email,
        string $password
    ): ?User {
        $user = new User();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setBirthDate($birthDate);
        $user->setNickname($nickName);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));

        return $user;
    }

    public function listUser(): array
    {
        return $this->findAll();
    }

    public function updateUser(User $user, string $name):void
    {
        $user->setName($name);
        $this->persistAndFlush($user);
    }

    public function findUserById(int $id): ?User
    {
        return $this->findOneBy(["id" => $id]);
    }

    public function persistAndFlush(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}

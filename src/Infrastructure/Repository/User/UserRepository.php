<?php

namespace App\Infrastructure\Repository\User;

use App\Domain\Model\Entity\User\User;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    /**
     * @param string $name
     * @param string $surname
     * @param \DateTime $birthDate
     * @param string $nickName
     * @param string $email
     * @param string $password
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insertUser(
        string $name,
        string $surname,
        \DateTime $birthDate,
        string $nickName,
        string $email,
        string $password
    ): void {
        $user = new User();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setBirthDate($birthDate);
        $user->setNickname($nickName);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));

        $this->persistAndFlush($user);
    }

    public function listUser(): array
    {
        return $this->findAll();
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $surname
     * @param string $nickname
     * @param string $email
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateUser(
        User $user,
        string $name,
        string $surname,
        string $nickname,
        string $email
    ): void
    {
        $user->setName($name);
        $user->setSurname($surname);
        $user->setNickname($nickname);
        $user->setEmail($email);

        $this->persistAndFlush($user);
    }

    public function findUserById(int $id): ?User
    {
        return $this->findOneBy(["id" => $id]);
    }

    public function findUserByKey(string $key, string $value): array
    {
        return $this->findBy([$key => $value]);
    }

    public function getValueByKey(User $user, string $key): ?string
    {
        if ($key == 'email') {
            return $user->getEmail();
        }
        if ($key == 'nickname') {
            return $user->getNickname();
        }
    }

    /**
     * @param User $user
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persistAndFlush(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}

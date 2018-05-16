<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/04/18
 * Time: 21:51
 */

namespace App\Infrastructure\Repository\Pet;

use App\Domain\Model\Entity\Pet\Pet;
use App\Domain\Model\Entity\Pet\PetRepositoryInterface;
use App\Domain\Model\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PetRepository extends ServiceEntityRepository implements PetRepositoryInterface
{
    /**
     * @param string $name
     * @param string $race
     * @param User $user
     * @param \DateTime $birthDate
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insertPet(
        string $name,
        string $race,
        User $user,
        \DateTime $birthDate
    ): void {
        $pet = new Pet();
        $pet->setName($name);
        $pet->setRace($race);
        $pet->setUser($user);
        $pet->setBirthDate($birthDate);

        $this->persistAndFlush($pet);
    }

    /**
     * @param Pet $pet
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persistAndFlush(Pet $pet): void
    {
        $this->getEntityManager()->persist($pet);
        $this->getEntityManager()->flush();
    }

}
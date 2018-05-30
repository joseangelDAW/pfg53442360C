<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 30/05/18
 * Time: 9:16
 */

namespace App\Infrastructure\Repository\News;

use App\Domain\Model\Entity\News\EntryEntity;
use App\Domain\Model\Entity\News\EntryEntityRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class EntryEntityRepository extends ServiceEntityRepository implements EntryEntityRepositoryInterface
{
    /**
     * @return array
     */
    public function listEntries(): array
    {
        return $this->findAll();
    }

    /**
     * @param string $title
     * @param string $content
     *
     * @return int
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insertEntry(
        string $title,
        string $content
    ): int {
        $entry = new EntryEntity();
        $entry->setTitle($title);
        $entry->setContent($content);

        $this->persistAndFlush($entry);

        return $entry->getId();
    }

    /**
     * @param EntryEntity $entry
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function persistAndFlush(EntryEntity $entry): void
    {
        $this->getEntityManager()->persist($entry);
        $this->getEntityManager()->flush();

    }
}
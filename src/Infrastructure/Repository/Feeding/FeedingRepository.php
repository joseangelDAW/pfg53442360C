<?php

namespace App\Infrastructure\Repository\Feeding;

use App\Domain\Model\Entity\Feeding\FeedingRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class FeedingRepository extends EntityRepository implements FeedingRepositoryInterface
{

}
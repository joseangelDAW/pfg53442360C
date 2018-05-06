<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:36
 */

namespace App\Infrastructure\Repository\Care;

use App\Domain\Model\Entity\Care\CareRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CareRepository extends EntityRepository implements CareRepositoryInterface
{

}
<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:41
 */

namespace App\Infrastructure\Repository\Hygiene;

use App\Domain\Model\Entity\Hygiene\HygieneRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class HygieneRepository extends EntityRepository implements HygieneRepositoryInterface
{

}
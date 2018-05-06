<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:41
 */

namespace App\Infrastructure\Repository\Vaccine;

use App\Domain\Model\Entity\Vaccine\VaccineRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class VaccineRepository extends EntityRepository implements VaccineRepositoryInterface
{

}
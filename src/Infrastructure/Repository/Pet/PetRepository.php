<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/04/18
 * Time: 21:51
 */

namespace App\Infrastructure\Repository\Pet;

use App\Domain\Model\Entity\Pet\PetRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class PetRepository extends EntityRepository implements PetRepositoryInterface
{

}
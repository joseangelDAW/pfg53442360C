<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 17/05/18
 * Time: 17:38
 */

namespace App\Application\Pet\ListPet;

interface ListPetTransformInterface
{
    public function transform(array $input): array;
}
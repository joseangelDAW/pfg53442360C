<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 8/05/18
 * Time: 19:56
 */

namespace App\Application\User\ListUser;


interface ListUserTransformInterface
{
    public function transform(array $queryInput): array;
}
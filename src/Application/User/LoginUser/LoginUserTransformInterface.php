<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 19/05/18
 * Time: 9:29
 */

namespace App\Application\User\LoginUser;


interface LoginUserTransformInterface
{
    public function transform(array $input): array;
}
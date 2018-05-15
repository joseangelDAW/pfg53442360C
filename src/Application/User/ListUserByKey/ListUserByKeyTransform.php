<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 15/05/18
 * Time: 20:58
 */

namespace App\Application\User\ListUserByKey;

class ListUserByKeyTransform implements ListUserByKeyTransformInterface
{
    public function transform(array $queryInput): array
    {
        $queryOutput = [];
        foreach ($queryInput as $user) {
            $queryOutput [] =
                [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "surname" => $user->getSurname(),
                    "birthDate" => $user->getBirthDate()->format('Y-m-d'),
                    "nickName" => $user->getNickname(),
                    "email" => $user->getEmail()
                ];
        }
        return $queryOutput;
    }

}
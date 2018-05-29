<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 14:21
 */

namespace App\Application\Pet\ListPetByUserId;

use App\Domain\Model\Entity\Pet\Pet;

class ListPetByUserIdTransform implements ListPetByUserIdTransformInterface
{
    /**
     * @param Pet[] $queryInput
     *
     * @return array
     */
    public function transform($queryInput): array
    {
        $queryOutput = [];
        foreach ($queryInput as $pet) {
            $queryOutput [] =
                [
                    "id" => $pet->getId(),
                    "name" => $pet->getName(),
                    "typePet" => $pet->getTypePet(),
                    "sex" => $pet->getSex(),
                    "race" => $pet->getRace(),
                    "birthDate" => $pet->getBirthDate()->format('Y-m-d')
                ];
        }

        return $queryOutput;
    }
}
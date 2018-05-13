<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13/05/18
 * Time: 12:15
 */

namespace App\Domain\Model\Service\Entity\Address;


use App\Domain\Model\Entity\User\User;
use App\Domain\Model\Entity\User\UserDoesNotExistException;
use App\Domain\Model\Entity\User\UserRepositoryInterface;

class CheckIfUserExists
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function check(int $id): ?User
    {
        $output = $this->userRepository->findUserById($id);
        if (is_null($output)) {
            throw new UserDoesNotExistException();
        }
        return $output;
    }
}
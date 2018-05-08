<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/05/18
 * Time: 19:43
 */

namespace App\Application\User\InsertUser;

use App\Domain\Model\Entity\User\UserRepositoryInterface;

class InsertUser
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param InsertUserCommand $insertUserCommand
     */
    public function handle(InsertUserCommand $insertUserCommand): void
    {
        $userEntity = $this->userRepository->insertUser(
            $insertUserCommand->getName(),
            $insertUserCommand->getSurname(),
            $insertUserCommand->getBirthDate(),
            $insertUserCommand->getNickName(),
            $insertUserCommand->getEmail(),
            $insertUserCommand->getPassword()
        );
        $this->userRepository->persistAndFlush($userEntity);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/05/18
 * Time: 19:43
 */

namespace App\Application\User\InsertUser;

use App\Domain\Model\Entity\User\EmailExistsException;
use App\Domain\Model\Entity\User\NickNameExistsException;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use App\Domain\Model\Service\Entity\User\CheckIfUserEmailExists;
use App\Domain\Model\Service\Entity\User\CheckIfUserNicknameExists;

class InsertUser
{
    const KEY_EMAIL = 'email';
    const KEY_NICKNAME = 'nickname';
    private $userRepository;
    private $checkIfUserEmailExists;
    private $checkIfUserNicknameExists;

    public function __construct(
        UserRepositoryInterface $userRepository,
        CheckIfUserEmailExists $checkIfUserEmailExists,
        CheckIfUserNicknameExists $checkIfUserNicknameExists
    )
    {
        $this->userRepository = $userRepository;
        $this->checkIfUserEmailExists = $checkIfUserEmailExists;
        $this->checkIfUserNicknameExists = $checkIfUserNicknameExists;
    }

    /**
     * @param InsertUserCommand $insertUserCommand
     * @return string
     */
    public function handle(InsertUserCommand $insertUserCommand): string
    {
        $output = 'ok';

        try {
            $this->checkIfUserEmailExists->check(
                self::KEY_EMAIL,
                $insertUserCommand->getEmail()
            );
        } catch (EmailExistsException $eex) {
            return $output = $eex->getMessage();
        }

        try {
            $this->checkIfUserNicknameExists->check(
                self::KEY_NICKNAME,
                $insertUserCommand->getNickName()
            );
        } catch (NickNameExistsException $nex) {
            return $output = $nex->getMessage();
        }

        $userEntity = $this->userRepository->insertUser(
            $insertUserCommand->getName(),
            $insertUserCommand->getSurname(),
            $insertUserCommand->getBirthDate(),
            $insertUserCommand->getNickName(),
            $insertUserCommand->getEmail(),
            $insertUserCommand->getPassword()
        );
        $this->userRepository->persistAndFlush($userEntity);

        return $output;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13/05/18
 * Time: 11:28
 */

namespace App\Application\User\UpdateUser;


use App\Domain\Model\Entity\User\EmailExistsException;
use App\Domain\Model\Entity\User\NickNameExistsException;
use App\Domain\Model\Entity\User\UserDoesNotExistException;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use App\Domain\Model\Service\Entity\Address\CheckIfUserExists;
use App\Domain\Model\Service\Entity\User\CheckIfUserEmailExists;
use App\Domain\Model\Service\Entity\User\CheckIfUserNicknameExists;

class UpdateUser
{
    const KEY_EMAIL = 'email';
    const KEY_NICKNAME = 'nickname';
    const OK = 'ok';

    private $userRepository;
    private $checkIfUserExists;
    private $checkIfUserEmailExists;
    private $checkIfUserNicknameExists;

    /**
     * UpdateUser constructor.
     * @param UserRepositoryInterface $userRepository
     * @param CheckIfUserExists $checkIfUserExists
     * @param CheckIfUserEmailExists $checkIfUserEmailExists
     * @param CheckIfUserNicknameExists $checkIfUserNicknameExists
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        CheckIfUserExists $checkIfUserExists,
        CheckIfUserEmailExists $checkIfUserEmailExists,
        CheckIfUserNicknameExists $checkIfUserNicknameExists
    )
    {
        $this->userRepository = $userRepository;
        $this->checkIfUserExists = $checkIfUserExists;
        $this->checkIfUserNicknameExists = $checkIfUserNicknameExists;
        $this->checkIfUserEmailExists = $checkIfUserEmailExists;
    }

    /**
     * @param UpdateUserCommand $updateUserCommand
     * @return string
     */
    public function handle(UpdateUserCommand $updateUserCommand): string
    {
        $output = self::OK;

        $userId = $updateUserCommand->getId();
        $userName = $updateUserCommand->getName();
        $userSurname = $updateUserCommand->getSurname();
        $userNickName = $updateUserCommand->getNickname();
        $userEmail = $updateUserCommand->getEmail();

        try {
            $userEntity = $this->checkIfUserExists->check($userId);
        } catch (UserDoesNotExistException $unex) {
            return $output = $unex->getMessage();
        }

        try {
            $this->checkIfUserEmailExists->check(
                self::KEY_EMAIL,
                $userEmail
            );
        } catch (EmailExistsException $eex) {
            return $output = $eex->getMessage();
        }

        try {
            $this->checkIfUserNicknameExists->check(
                self::KEY_NICKNAME,
                $userNickName
            );
        } catch (NickNameExistsException $nex) {
            return $output = $nex->getMessage();
        }

        $userEntity = $this->userRepository->updateUser(
            $userEntity,
            $userName,
            $userSurname,
            $userNickName,
            $userEmail
        );
        $this->userRepository->persistAndFlush($userEntity);

        return $output;
    }
}
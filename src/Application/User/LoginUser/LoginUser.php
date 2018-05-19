<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 19/05/18
 * Time: 9:26
 */

namespace App\Application\User\LoginUser;


use App\Domain\Model\Entity\User\LoginFailedException;
use App\Domain\Model\Entity\User\NickNameDoesNotExistException;
use App\Domain\Model\Entity\User\UserConst;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use App\Domain\Model\Service\Entity\User\CheckIfUserNicknameDoesNotExist;
use App\Domain\Model\Service\Entity\User\CheckLoginMatchNicknameAndPassword;

class LoginUser
{
    private $userRepository;
    private $loginUserTransform;
    private $checkIfUserNicknameDoesNotExist;
    private $checkLoginMatchNicknameAndPassword;

    public function __construct(
        UserRepositoryInterface $userRepository,
        LoginUserTransformInterface $loginUserTransform,
        CheckIfUserNicknameDoesNotExist $checkIfUserNicknameDoesNotExist,
        CheckLoginMatchNicknameAndPassword $checkLoginMatchNicknameAndPassword
    ) {
        $this->userRepository = $userRepository;
        $this->loginUserTransform = $loginUserTransform;
        $this->checkIfUserNicknameDoesNotExist = $checkIfUserNicknameDoesNotExist;
        $this->checkLoginMatchNicknameAndPassword = $checkLoginMatchNicknameAndPassword;
    }

    /**
     * @param LoginUserCommand $loginUserCommand
     * @return array
     */
    public function handle(LoginUserCommand $loginUserCommand): array
    {
        $nickname = $loginUserCommand->getUser();
        $password = $loginUserCommand->getPassword();

        try {
            $this->checkIfUserNicknameDoesNotExist->check(
                UserConst::NICKNAME,
                $nickname
            );
        } catch (NickNameDoesNotExistException $ndnex) {
            return ['data' => $ndnex->getMessage(), 'code' => $ndnex->getCode()];
        }

        $userEntity = $this->userRepository->findOneUserByNickname($nickname);

        try {
            $this->checkLoginMatchNicknameAndPassword->check(
                $userEntity, $password
            );
        } catch (LoginFailedException $lfex) {
            return ['data' => $lfex->getMessage(), 'code' => $lfex->getCode()];
        }

        return (['data' => UserConst::OK_LOGIN, 'code' => UserConst::OK_LOGIN_CODE]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13/05/18
 * Time: 12:42
 */

namespace App\Domain\Model\Service\Entity\User;

use App\Domain\Model\Entity\User\EmailExistsException;
use App\Domain\Model\Entity\User\UserRepositoryInterface;


class CheckIfUserEmailExists
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function check(string $keyEmail, string $value)
    {
        $output = $this->userRepository->findUserByKey($keyEmail, $value);
        if (!empty($output)) {
            throw new EmailExistsException();
        }
    }
}
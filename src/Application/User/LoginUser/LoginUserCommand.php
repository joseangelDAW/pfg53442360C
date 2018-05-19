<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 19/05/18
 * Time: 9:31
 */

namespace App\Application\User\LoginUser;


use Assert\Assertion;

class LoginUserCommand
{
    private $user;
    private $password;

    /**
     * LoginUserCommand constructor.
     * @param string $user
     * @param string $password
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(
        string $user,
        string $password
    )
    {
        Assertion::string($user);
        Assertion::notBlank($user);
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}
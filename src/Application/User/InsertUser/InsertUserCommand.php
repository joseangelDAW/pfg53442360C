<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 5/05/18
 * Time: 10:49
 */

namespace App\Application\User\InsertUser;


use Assert\Assertion;

class InsertUserCommand
{
    private $name;
    private $surname;
    private $birthDate;
    private $nickName;
    private $email;
    private $password;

    /**
     * InsertUserCommand constructor.
     * @param string $name
     * @param string $surname
     * @param \DateTime $birthDate
     * @param string $nickName
     * @param string $email
     * @param string $password
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(
        string $name,
        string $surname,
        \DateTime $birthDate,
        string $nickName,
        string $email,
        string $password
    ) {

        Assertion::notBlank($name);
        Assertion::string($name);
        Assertion::notBlank($surname);
        Assertion::string($surname);
        Assertion::notBlank($birthDate);
//        Assertion::date($birthDate);
        Assertion::notBlank($email);
        Assertion::string($email);
        Assertion::notBlank($password);
        Assertion::string($password);

        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->nickName = $nickName;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
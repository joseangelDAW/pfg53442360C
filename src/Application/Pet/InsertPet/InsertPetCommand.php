<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 16/05/18
 * Time: 19:35
 */

namespace App\Application\Pet\InsertPet;

use Assert\Assertion;
use DateTime;

class InsertPetCommand
{
    private $name;
    private $race;
    private $userId;
    private $birthDate;

    /**
     * InsertPetCommand constructor.
     * @param string $name
     * @param string $race
     * @param int $userId
     * @param string $birthDate
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(
        string $name,
        string $race,
        int $userId,
        string $birthDate
    ) {
        Assertion::notBlank($name);
        Assertion::string($name);
        Assertion::notBlank($race);
        Assertion::string($race);
        Assertion::notBlank($userId);
        Assertion::numeric($userId);
        Assertion::notBlank($birthDate);
        Assertion::string($birthDate);

        $this->name = $name;
        $this->race = $race;
        $this->userId = $userId;
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getBirthDate(): \DateTime
    {
        return DateTime::createFromFormat('Y-m-d', $this->birthDate);
    }


}
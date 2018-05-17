<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 17/05/18
 * Time: 8:28
 */

namespace App\Application\Pet\UpdatePet;

use Assert\Assertion;
use DateTime;

class UpdatePetCommand
{
    private $name;
    private $race;
    private $id;
    private $birthDate;

    /**
     * UpdatePetCommand constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $race
     * @param string $birthDate
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(
        int $id,
        string $name,
        string $race,
        string $birthDate
    ) {
        Assertion::notBlank($name);
        Assertion::string($name);
        Assertion::notBlank($race);
        Assertion::string($race);
        Assertion::notBlank($id);
        Assertion::numeric($id);
        Assertion::notBlank($birthDate);
        Assertion::string($birthDate);

        $this->name = $name;
        $this->race = $race;
        $this->id = $id;
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
     * Get Id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return DateTime::createFromFormat('Y-m-d', $this->birthDate);
    }
}
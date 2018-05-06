<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/04/18
 * Time: 20:27
 */

namespace App\Infrastructure\Form\Address;

use Symfony\Component\Validator\Constraints as Assert;

class AddressClass
{
    /**
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * @Assert\NotBlank()
     */
    private $street;

    /**
     * @Assert\NotBlank()
     */
    private $floor;

    /**
     * @Assert\NotBlank()
     */
    private $floorInformation;

    /**
     * @Assert\NotBlank()
     */
    private $cp;

    /**
     * @Assert\NotBlank()
     */
    private $province;

    /**
     * @Assert\NotBlank()
     */
    private $city;


    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor): void
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getFloorInformation()
    {
        return $this->floorInformation;
    }

    /**
     * @param mixed $floorInformation
     */
    public function setFloorInformation($floorInformation): void
    {
        $this->floorInformation = $floorInformation;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province): void
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/05/18
 * Time: 18:51
 */

namespace App\Application\Address\InsertAddress;

use App\Domain\Model\Entity\Address\AddressRepositoryInterface;
use App\Domain\Model\Entity\User\UserDoesNotExistException;
use App\Domain\Model\Entity\User\UserRepositoryInterface;
use App\Domain\Model\Service\Entity\Address\CheckIfUserExists;

class InsertAddress
{
    private $addressRepository;
    private $userRepository;
    private $checkIfUserExists;

    /**
     * InsertAddress constructor.
     * @param AddressRepositoryInterface $addressRepository
     * @param UserRepositoryInterface $userRepository
     * @param CheckIfUserExists $checkIfUserExists
     */
    public function __construct(
        AddressRepositoryInterface $addressRepository,
        UserRepositoryInterface $userRepository,
        CheckIfUserExists $checkIfUserExists

    )
    {
        $this->addressRepository = $addressRepository;
        $this->userRepository = $userRepository;
        $this->checkIfUserExists = $checkIfUserExists;
    }

    /**
     * @param InsertAddressCommand $insertAddressCommand
     * @return string
     */
    public function handle(InsertAddressCommand $insertAddressCommand): string
    {
        $output = "ok";

        $userId = $insertAddressCommand->getUserId();
        try {
            $userEntity = $this->checkIfUserExists->check($userId);
        } catch (UserDoesNotExistException $unex) {
            return $output = $unex->getMessage();
        }


        $addressEntity = $this->addressRepository->insertAddress(
            $insertAddressCommand->getStreet(),
            $insertAddressCommand->getNumber(),
            $userEntity,
            $insertAddressCommand->getFloor(),
            $insertAddressCommand->getFloorInformation(),
            $insertAddressCommand->getProvince(),
            $insertAddressCommand->getCity(),
            $insertAddressCommand->getCp()
        );
        $this->addressRepository->persistAndFlush($addressEntity);

        return $output;
    }
}
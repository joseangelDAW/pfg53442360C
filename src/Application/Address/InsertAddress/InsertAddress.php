<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/05/18
 * Time: 18:51
 */

namespace App\Application\Address\InsertAddress;

use App\Domain\Model\Entity\Address\AddressRepositoryInterface;
use App\Domain\Model\Entity\User\UserRepositoryInterface;

class InsertAddress
{
    private $addressRepository;
    private $userRepository;

    /**
     * InsertAddress constructor.
     * @param AddressRepositoryInterface $addressRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        AddressRepositoryInterface $addressRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->addressRepository = $addressRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param InsertAddressCommand $insertAddressCommand
     */
    public function handle(InsertAddressCommand $insertAddressCommand): void
    {
        $userEntity = $this
            ->userRepository
            ->findUserById($insertAddressCommand->getUserId());

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
    }
}
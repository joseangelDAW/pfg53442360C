<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13/05/18
 * Time: 17:51
 */

namespace App\Application\Address\UpdateAddress;

use App\Domain\Model\Entity\Address\AddressDoesNotExistException;
use App\Domain\Model\Entity\Address\AddressRepositoryInterface;
use App\Domain\Model\Service\Entity\Address\CheckIfAddressExists;

class UpdateAddress
{
    const OK = 'ok';

	private $addressRepository;
	private $updateAddressTransform;
	private $checkIfAddressExists;


	public function __construct (
		AddressRepositoryInterface $addressRepository,
		UpdateAddressTransformInterface $updateAddressTransform,
        CheckIfAddressExists $checkIfAddressExists
	) {
	$this->addressRepository = $addressRepository;
	$this->updateAddressTransform = $updateAddressTransform;
	$this->checkIfAddressExists = $checkIfAddressExists;
	}

	public function handle(UpdateAddressCommand $updateAddressCommand)
	{
	    $output = self::OK;

		$addressId = $updateAddressCommand->getId();

		try {
		    $addressEntity = $this->checkIfAddressExists->check($addressId);
        } catch (AddressDoesNotExistException $anex) {
		    return $output = $anex->getMessage();
        }

        $addressEntity = $this->addressRepository->updateAddress(
            $addressEntity,
            $updateAddressCommand->getStreet(),
            $updateAddressCommand->getNumber(),
            $updateAddressCommand->getFloor(),
            $updateAddressCommand->getFloorInformation(),
            $updateAddressCommand->getProvince(),
            $updateAddressCommand->getCity(),
            $updateAddressCommand->getCp()
        );
        $this->addressRepository->persistAndFlush($addressEntity);

        return $output;
	}

}
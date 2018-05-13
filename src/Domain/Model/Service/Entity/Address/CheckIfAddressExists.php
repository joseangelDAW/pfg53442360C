<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 13/05/18
 * Time: 20:11
 */

namespace App\Domain\Model\Service\Entity\Address;


use App\Domain\Model\Entity\Address\Address;
use App\Domain\Model\Entity\Address\AddressDoesNotExistException;
use App\Domain\Model\Entity\Address\AddressRepositoryInterface;

class CheckIfAddressExists
{
    private $addressRepository;

    /**
     * CheckIfAddressExists constructor.
     * @param AddressRepositoryInterface $addressRepository
     */
    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @param int $id
     * @return Address|null
     * @throws AddressDoesNotExistException
     */
    public function check(int $id): ?Address
    {
        $output = $this->addressRepository->findAddressById($id);
        if (is_null($output)) {
            throw new AddressDoesNotExistException();
        }
        return $output;
    }
}
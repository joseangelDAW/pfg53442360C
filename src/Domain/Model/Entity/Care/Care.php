<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:34
 */

namespace App\Domain\Model\Entity\Care;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\Care\CareRepository")
 */
class Care
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Domain\Model\Entity\Pet\Pet", inversedBy="pets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pet;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPet()
    {
        return $this->pet;
    }

    /**
     * @param mixed $pet
     */
    public function setPet($pet): void
    {
        $this->pet = $pet;
    }


}
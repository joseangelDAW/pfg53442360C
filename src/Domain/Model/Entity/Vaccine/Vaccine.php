<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:41
 */

namespace App\Domain\Model\Entity\Vaccine;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\Vaccine\VaccineRepository")
 */
class Vaccine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Care\Care", inversedBy="cares")
     * @ORM\JoinColumn(nullable=false)
     */
    private $care;

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
    public function getCare()
    {
        return $this->care;
    }

    /**
     * @param mixed $care
     */
    public function setCare($care): void
    {
        $this->care = $care;
    }


}
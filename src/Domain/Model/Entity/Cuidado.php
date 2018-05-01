<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:34
 */

namespace App\Domain\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\CuidadoRepository")
 */
class Cuidado
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Domain\Model\Entity\Mascota", inversedBy="mascotas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mascota;

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
    public function getMascota()
    {
        return $this->mascota;
    }

    /**
     * @param mixed $mascota
     */
    public function setMascota($mascota): void
    {
        $this->mascota = $mascota;
    }
}
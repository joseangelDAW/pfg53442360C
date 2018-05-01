<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 1/05/18
 * Time: 8:41
 */

namespace App\Domain\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\VacunaRepository")
 */
class Vacuna
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Cuidado", inversedBy="cuidados")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cuidado;

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
    public function getCuidado()
    {
        return $this->cuidado;
    }

    /**
     * @param mixed $cuidado
     */
    public function setCuidado($cuidado): void
    {
        $this->cuidado = $cuidado;
    }
}
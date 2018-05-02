<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/04/18
 * Time: 21:47
 */

namespace App\Domain\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\MascotaRepository")
 */
class Mascota
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\User\User", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $raza;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_nacimiento;

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * @param mixed $raza
     */
    public function setRaza($raza): void
    {
        $this->raza = $raza;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
}
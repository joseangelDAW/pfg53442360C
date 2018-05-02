<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/04/18
 * Time: 20:27
 */

namespace App\Domain\Model\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Repository\DireccionRepository")
 */
class Direccion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\User\User", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $piso;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $especificacionPiso;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $provincia;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $poblacion;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
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
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle): void
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @param mixed $piso
     */
    public function setPiso($piso): void
    {
        $this->piso = $piso;
    }

    /**
     * @return mixed
     */
    public function getEspecificacionPiso()
    {
        return $this->especificacionPiso;
    }

    /**
     * @param mixed $especificacionPiso
     */
    public function setEspecificacionPiso($especificacionPiso): void
    {
        $this->especificacionPiso = $especificacionPiso;
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
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia): void
    {
        $this->provincia = $provincia;
    }

    /**
     * @return mixed
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param mixed $poblacion
     */
    public function setPoblacion($poblacion): void
    {
        $this->poblacion = $poblacion;
    }
}
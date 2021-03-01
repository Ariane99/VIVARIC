<?php

namespace App\Entity;

use App\Repository\GastosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GastosRepository::class)
 */
class Gastos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_gasto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */   
    private $monto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreGasto(): ?string
    {
        return $this->nombre_gasto;
    }

    public function setNombreGasto(string $nombre_gasto): self
    {
        $this->nombre_gasto = $nombre_gasto;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getMonto(): ?string
    {
        return $this->monto;
    }

    public function setMonto(string $monto): self
    {
        $this->monto = $monto;

        return $this;
    }
    public function __toString()
    {
        return $this->nombre_gasto;
    }
}

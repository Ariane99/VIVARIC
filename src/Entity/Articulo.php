<?php

namespace App\Entity;

use App\Repository\ArticuloRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticuloRepository::class)
 */
class Articulo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nombreArt;

    /**
     * @ORM\Column(type="string", length=600)
     */
    private $detalle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $dimension;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="articulo")
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleIngreso", mappedBy="articulo", cascade={"persist"}))
     */
    private $detalleingreso;

    public function getDetalleIngreso(): ?DetalleIngreso
    {
        return $this->detalleingreso;
    }

    public function setDetalleIngreso(?DetalleIngreso $detalleingreso): self
    {
        $this->detalleingreso = $detalleingreso;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreArt(): ?string
    {
        return $this->nombreArt;
    }

    public function setNombreArt(string $nombreArt): self
    {
        $this->nombreArt = $nombreArt;

        return $this;
    }

    public function getDetalle(): ?string
    {
        return $this->detalle;
    }

    public function setDetalle(string $detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    public function getStock(): ?int
    {

        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function __toString()
    {
        return $this->nombreArt;
    }

}

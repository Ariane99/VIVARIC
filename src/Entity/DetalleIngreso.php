<?php

namespace App\Entity;

use App\Repository\DetalleIngresoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetalleIngresoRepository::class)
 */
class DetalleIngreso
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precioven_mayor;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precioven_minimo_mayor;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precioven_menor;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precioven_minimo_menor;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precio_compra;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulo", inversedBy="detalleingreso")
     */
    private $articulo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingreso", inversedBy="detalleingreso")
     */
    private $ingreso;

    public function getIngreso(): ?Ingreso
    {
        return $this->ingreso;
    }

    public function setIngreso(?Ingreso $ingreso): self
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    public function getArticulo(): ?Articulo
    {
        return $this->articulo;
    }

    public function setArticulo(?Articulo $articulo): self
    {
        $this->articulo = $articulo;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPreciovenMayor(): ?string
    {
        return $this->precioven_mayor;
    }

    public function setPreciovenMayor(string $precioven_mayor): self
    {
        $this->precioven_mayor = $precioven_mayor;

        return $this;
    }

    public function getPreciovenMinimoMayor(): ?string
    {
        return $this->precioven_minimo_mayor;
    }

    public function setPreciovenMinimoMayor(string $precioven_minimo_mayor): self
    {
        $this->precioven_minimo_mayor = $precioven_minimo_mayor;

        return $this;
    }

    public function getPreciovenMenor(): ?string
    {
        return $this->precioven_menor;
    }

    public function setPreciovenMenor(string $precioven_menor): self
    {
        $this->precioven_menor = $precioven_menor;

        return $this;
    }

    public function getPreciovenMinimoMenor(): ?string
    {
        return $this->precioven_minimo_menor;
    }

    public function setPreciovenMinimoMenor(string $precioven_minimo_menor): self
    {
        $this->precioven_minimo_menor = $precioven_minimo_menor;

        return $this;
    }

    public function getPrecioCompra(): ?string
    {
        return $this->precio_compra;
    }

    public function setPrecioCompra(string $precio_compra): self
    {
        $this->precio_compra = $precio_compra;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}

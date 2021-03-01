<?php

namespace App\Entity;

use App\Repository\DetalleVentaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetalleVentaRepository::class)
 */
class DetalleVenta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $precio_venta;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Venta", inversedBy="detalleventa")
     * @ORM\JoinColumn(name="venta_id", referencedColumnName="id")
     */
    private $venta;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulo", inversedBy="detalleventa")
     */
    private $articulo;

    public function getArticulo(): ?Articulo
    {
        return $this->articulo;
    }

    public function setArticulo(?Articulo $articulo): self
    {
        $this->articulo = $articulo;

        return $this;
    }

    public function getVenta(): ?Venta
    {
        return $this->venta;
    }

    public function setVenta(?Venta $venta): self
    {
        $this->venta = $venta;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrecioVenta(): ?string
    {
        return $this->precio_venta;
    }

    public function setPrecioVenta(string $precio_venta): self
    {
        $this->precio_venta = $precio_venta;

        return $this;
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

    public function __toString()
    {
        return $this->articulo.' - '.$this->cantidad.' - '.$this->precio_venta.' - Total: '.$this->cantidad*$this->precio_venta;
    }
}

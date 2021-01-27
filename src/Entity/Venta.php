<?php

namespace App\Entity;

use App\Repository\VentaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VentaRepository::class)
 */
class Venta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cicliente;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nombrecliente;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ciudad;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tipo_comprobante;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $serie_comprobante;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $num_comprobante;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_hora;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $impuesto;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $estado;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $total_venta;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="venta")
     */
    private $persona;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleVenta", mappedBy="venta")
     */
    private $detalleventa;

    public function getDetalleVenta(): ?DetalleVenta
    {
        return $this->detalleventa;
    }

    public function setDetalleVenta(?DetalleVenta $detalleventa): self
    {
        $this->detalleventa = $detalleventa;

        return $this;
    }

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiCliente(): ?string
    {
        return $this->cicliente;
    }

    public function setCiCliente(string $cicliente): self
    {
        $this->cicliente = $cicliente;

        return $this;
    }

    public function getNombreCliente(): ?string
    {
        return $this->nombrecliente;
    }

    public function setNombreCliente(string $nombrecliente): self
    {
        $this->nombrecliente = $nombrecliente;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getTipoComprobante(): ?string
    {
        return $this->tipo_comprobante;
    }

    public function setTipoComprobante(string $tipo_comprobante): self
    {
        $this->tipo_comprobante = $tipo_comprobante;

        return $this;
    }

    public function getSerieComprobante(): ?string
    {
        return $this->serie_comprobante;
    }

    public function setSerieComprobante(string $serie_comprobante): self
    {
        $this->serie_comprobante = $serie_comprobante;

        return $this;
    }

    public function getNumComprobante(): ?string
    {
        return $this->num_comprobante;
    }

    public function setNumComprobante(string $num_comprobante): self
    {
        $this->num_comprobante = $num_comprobante;

        return $this;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fecha_hora;
    }

    public function setFechaHora(\DateTimeInterface $fecha_hora): self
    {
        $this->fecha_hora = $fecha_hora;

        return $this;
    }

    public function getImpuesto(): ?string
    {
        return $this->impuesto;
    }

    public function setImpuesto(string $impuesto): self
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getTotalVenta(): ?string
    {
        return $this->total_venta;
    }

    public function setTotalVenta(string $total_venta): self
    {
        $this->total_venta = $total_venta;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}

<?php

namespace App\Entity;

use App\Repository\IngresoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngresoRepository::class)
 */
class Ingreso
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
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
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleIngreso", mappedBy="ingreso")
     */
    private $detalleingreso;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="ingreso")
     */
    private $persona;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proveedores", inversedBy="ingreso")
     */
    private $proveedor;

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Persona $proveedor): self
    {
        $this->proveedor = $proveedor;

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

    public function getDetalleIngreso(): ?DetalleIngreso
    {
        return $this->detalleingreso;
    }

    public function setDetalleIngreso(?DetalleIngreso $detalleingreso): self
    {
        $this->detalleingreso = $detalleingreso;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function __toString()
    {
        return $this->id;
    }
}

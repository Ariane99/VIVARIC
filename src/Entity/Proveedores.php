<?php

namespace App\Entity;

use App\Repository\ProveedoresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProveedoresRepository::class)
 */
class Proveedores
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nombre_prov;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $email_prov;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ci_prov;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion_prov;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $telefono_prov;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingreso", mappedBy="proveedor")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreProv(): ?string
    {
        return $this->nombre_prov;
    }

    public function setNombreProv(string $nombre_prov): self
    {
        $this->nombre_prov = $nombre_prov;

        return $this;
    }

    public function getEmailProv(): ?string
    {
        return $this->email_prov;
    }

    public function setEmailProv(string $email_prov): self
    {
        $this->email_prov = $email_prov;

        return $this;
    }

    public function getCiProv(): ?string
    {
        return $this->ci_prov;
    }

    public function setCiProv(string $ci_prov): self
    {
        $this->ciprov = $ci_prov;

        return $this;
    }

    public function getDireccionProv(): ?string
    {
        return $this->direccion_prov;
    }

    public function setDireccionProv(string $direccion_prov): self
    {
        $this->direccion_prov = $direccion_prov;

        return $this;
    }

    public function getTelefonoProv(): ?string
    {
        return $this->telefono_prov;
    }

    public function setTelefonoProv(string $telefono_prov): self
    {
        $this->telefono_prov = $telefono_prov;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre_prov;
    }
}

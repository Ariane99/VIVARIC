<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriaRepository::class)
 */
class Categoria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nombreCat;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articulo", mappedBy="categoria")
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
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCat(): ?string
    {
        return $this->nombreCat;
    }

    public function setNombreCat(string $nombreCat): self
    {
        $this->nombreCat = $nombreCat;

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

    public function __toString()
    {
        return $this->nombreCat;
    }

}

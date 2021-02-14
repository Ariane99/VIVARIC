<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PersonaRepository;
use Symfony\Component\Security\Core\User\UserInterface;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @ORM\Entity(repositoryClass=PersonaRepository::class)
 */
class Persona implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ci;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="json")
     */
    private $roles=[];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingreso", mappedBy="persona")
     */
    private $ingreso;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Venta", mappedBy="persona")
     */
    private $venta;

    //////////////////////////////////////////////////////////////////////////////

    public function getVenta(): ?Venta
    {
        return $this->venta;
    }

    public function setVenta(?Venta $venta): self
    {
        $this->venta = $venta;

        return $this;
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCi(): ?string
    {
        return $this->ci;
    }

    public function setCi(string $ci): self
    {
        $this->ci = $ci;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {   
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash( $password, PASSWORD_DEFAULT);
        //$this->password = password_hash( $password, PASSWORD_DEFAULT);
        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        //E$this->plainPassword = null;
    }

}

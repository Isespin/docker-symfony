<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lector;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cliente;

    /**
     * @ORM\Column(type="boolean")
     */
    private $redactor;

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
        //(string) $this->password
        if(isset($this->administrador) && $this->administrador){$roles[] = 'ROLE_ADMIN';}
        if(isset($this->redactor) && $this->redactor){$roles[] = 'ROLE_REDACTOR';}
        if(isset($this->cliente) && $this->cliente){$roles[] = 'ROLE_CLIENTE';}
        if(isset($this->lector) && $this->lector){$roles[] = 'ROLE_LECTOR';}
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
        $this->password = $password;

        return $this;
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
        // $this->plainPassword = null;
    }

    public function getAdministrador(): ?bool
    {
        return $this->administrador;
    }

    public function setAdministrador(bool $administrador): self
    {
        $this->administrador = $administrador;

        return $this;
    }

    public function getLector(): ?bool
    {
        return $this->lector;
    }

    public function setLector(bool $lector): self
    {
        $this->lector = $lector;

        return $this;
    }

    public function getCliente(): ?bool
    {
        return $this->cliente;
    }

    public function setCliente(bool $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getRedactor(): ?bool
    {
        return $this->redactor;
    }

    public function setRedactor(bool $redactor): self
    {
        $this->redactor = $redactor;

        return $this;
    }
}

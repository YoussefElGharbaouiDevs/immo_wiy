<?php

namespace App\Entity;

use App\Repository\SecuUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecuUserRepository::class)]
class SecuUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $First_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Password = null;

    #[ORM\Column(length: 255)]
    private ?string $Phone_number = null;

    #[ORM\Column]
    private ?int $Role_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->First_name;
    }

    public function setFirstName(string $First_name): static
    {
        $this->First_name = $First_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->Last_name;
    }

    public function setLastName(string $Last_name): static
    {
        $this->Last_name = $Last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->Phone_number;
    }

    public function setPhoneNumber(string $Phone_number): static
    {
        $this->Phone_number = $Phone_number;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->Role_id;
    }

    public function setRoleId(int $Role_id): static
    {
        $this->Role_id = $Role_id;

        return $this;
    }
}

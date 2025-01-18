<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Owner_id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Location = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column]
    private ?int $Property_type_id = null;

    #[ORM\Column]
    private ?int $Status_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwnerId(): ?int
    {
        return $this->Owner_id;
    }

    public function setOwnerId(int $Owner_id): static
    {
        $this->Owner_id = $Owner_id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): static
    {
        $this->Location = $Location;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getPropertyTypeId(): ?int
    {
        return $this->Property_type_id;
    }

    public function setPropertyTypeId(int $Property_type_id): static
    {
        $this->Property_type_id = $Property_type_id;

        return $this;
    }

    public function getStatusId(): ?int
    {
        return $this->Status_id;
    }

    public function setStatusId(int $Status_id): static
    {
        $this->Status_id = $Status_id;

        return $this;
    }
}

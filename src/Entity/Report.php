<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportRepository::class)]
class Report
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $User_id = null;

    #[ORM\Column]
    private ?int $Owner_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->User_id;
    }

    public function setUserId(int $User_id): static
    {
        $this->User_id = $User_id;

        return $this;
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
}

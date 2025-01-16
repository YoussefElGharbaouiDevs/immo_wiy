<?php

namespace App\Entity;

use App\Repository\CommonBaseEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommonBaseEntityRepository::class)]
class CommonBaseEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Updated_at = null;

    #[ORM\Column]
    private ?int $Created_by = null;

    #[ORM\Column]
    private ?int $Updated_by = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $Created_at): static
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->Updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $Updated_at): static
    {
        $this->Updated_at = $Updated_at;

        return $this;
    }

    public function getCreatedBy(): ?int
    {
        return $this->Created_by;
    }

    public function setCreatedBy(int $Created_by): static
    {
        $this->Created_by = $Created_by;

        return $this;
    }

    public function getUpdatedBy(): ?int
    {
        return $this->Updated_by;
    }

    public function setUpdatedBy(int $Updated_by): static
    {
        $this->Updated_by = $Updated_by;

        return $this;
    }
}

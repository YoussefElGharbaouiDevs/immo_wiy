<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractRepository::class)]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Property_id = null;

    #[ORM\Column]
    private ?int $Tenant_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $End_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropertyId(): ?int
    {
        return $this->Property_id;
    }

    public function setPropertyId(int $Property_id): static
    {
        $this->Property_id = $Property_id;

        return $this;
    }

    public function getTenantId(): ?int
    {
        return $this->Tenant_id;
    }

    public function setTenantId(int $Tenant_id): static
    {
        $this->Tenant_id = $Tenant_id;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->Start_date;
    }

    public function setStartDate(\DateTimeInterface $Start_date): static
    {
        $this->Start_date = $Start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->End_date;
    }

    public function setEndDate(\DateTimeInterface $End_date): static
    {
        $this->End_date = $End_date;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Contract_id = null;

    #[ORM\Column]
    private ?float $Amount = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Payment_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractId(): ?int
    {
        return $this->Contract_id;
    }

    public function setContractId(int $Contract_id): static
    {
        $this->Contract_id = $Contract_id;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    public function setAmount(float $Amount): static
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeImmutable
    {
        return $this->Payment_date;
    }

    public function setPaymentDate(\DateTimeImmutable $Payment_date): static
    {
        $this->Payment_date = $Payment_date;

        return $this;
    }
}

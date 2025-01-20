<?php
// src/Entity/Payment.php

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

    // Modification du nom de la propriété pour correspondre à l'usage du contrôleur
    #[ORM\Column]
    private ?float $paymentAmount = null;

    #[ORM\Column(type: "datetime_immutable")]
    private ?\DateTimeImmutable $paymentDate = null;

    // Nouveau champ pour le prénom du client
    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    // Nouveau champ pour le nom du client
    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    // Nouveau champ pour le numéro de la carte bancaire
    #[ORM\Column(length: 255)]
    private ?string $cardNumber = null;

    // Nouveau champ pour la date d'expiration de la carte bancaire
    #[ORM\Column(type: "datetime_immutable")] // Utilisation d'un type DateTime pour stocker une date complète
    private ?\DateTimeImmutable $expirationDate = null;

    // Nouveau champ pour le code de sécurité (CVV)
    #[ORM\Column(length: 4)] // Le code CVV peut être de 3 ou 4 chiffres
    private ?string $cvv = null;

    // Nouveau champ pour le type de carte
    #[ORM\Column(length: 50)] // Le type de carte (par exemple, "Visa", "MasterCard", etc.)
    private ?string $cardType = null;

    // Nouveau champ pour l'ID de la maison
    #[ORM\Column(type: "integer")]
    private ?int $houseId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentAmount(): ?float
    {
        return $this->paymentAmount;
    }

    public function setPaymentAmount(float $paymentAmount): static
    {
        $this->paymentAmount = $paymentAmount;
        return $this;
    }

    public function getPaymentDate(): ?\DateTimeImmutable
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeImmutable $paymentDate): static
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    // Getter et setter pour le prénom du client
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;
        return $this;
    }

    // Getter et setter pour le nom du client
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    // Getter et setter pour le numéro de carte
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): static
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    // Getter et setter pour la date d'expiration de la carte
    public function getExpirationDate(): ?\DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeImmutable $expirationDate): static
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    // Getter et setter pour le code CVV
    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(string $cvv): static
    {
        $this->cvv = $cvv;
        return $this;
    }

    // Getter et setter pour le type de carte
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function setCardType(string $cardType): static
    {
        $this->cardType = $cardType;
        return $this;
    }

    // Getter et setter pour l'ID de la maison
    public function getHouseId(): ?int
    {
        return $this->houseId;
    }

    public function setHouseId(int $houseId): static
    {
        $this->houseId = $houseId;
        return $this;
    }
}

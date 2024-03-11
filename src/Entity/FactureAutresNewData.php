<?php

namespace App\Entity;

use App\Repository\FactureAutresNewDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureAutresNewDataRepository::class)]
class FactureAutresNewData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomclient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $telclient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totalht = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totaltva = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totalttc = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creepar = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datemodification = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $typepaiment = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $numerocheque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getNomclient(): ?string
    {
        return $this->nomclient;
    }

    public function setNomclient(string $nomclient): static
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelclient(): ?string
    {
        return $this->telclient;
    }

    public function setTelclient(string $telclient): static
    {
        $this->telclient = $telclient;

        return $this;
    }

    public function getTotalht(): ?string
    {
        return $this->totalht;
    }

    public function setTotalht(string $totalht): static
    {
        $this->totalht = $totalht;

        return $this;
    }

    public function getTotaltva(): ?string
    {
        return $this->totaltva;
    }

    public function setTotaltva(string $totaltva): static
    {
        $this->totaltva = $totaltva;

        return $this;
    }

    public function getTotalttc(): ?string
    {
        return $this->totalttc;
    }

    public function setTotalttc(string $totalttc): static
    {
        $this->totalttc = $totalttc;

        return $this;
    }

    public function getCreepar(): ?string
    {
        return $this->creepar;
    }

    public function setCreepar(string $creepar): static
    {
        $this->creepar = $creepar;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): static
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getDatemodification(): ?\DateTimeInterface
    {
        return $this->datemodification;
    }

    public function setDatemodification(\DateTimeInterface $datemodification): static
    {
        $this->datemodification = $datemodification;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTypepaiment(): ?string
    {
        return $this->typepaiment;
    }

    public function setTypepaiment(string $typepaiment): static
    {
        $this->typepaiment = $typepaiment;

        return $this;
    }

    public function getNumerocheque(): ?string
    {
        return $this->numerocheque;
    }

    public function setNumerocheque(string $numerocheque): static
    {
        $this->numerocheque = $numerocheque;

        return $this;
    }
}

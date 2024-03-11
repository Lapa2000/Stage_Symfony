<?php

namespace App\Entity;

use App\Repository\AvoirClientsHistoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirClientsHistoryRepository::class)]
class AvoirClientsHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $modepaimement = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $numerocompte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeclient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codefacture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montanttotalfacture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montantsaisie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ancienmontant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $payetawa = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $restantmazal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datemontant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creepar = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datemodification = null;

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

    public function getModepaimement(): ?string
    {
        return $this->modepaimement;
    }

    public function setModepaimement(string $modepaimement): static
    {
        $this->modepaimement = $modepaimement;

        return $this;
    }

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): static
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }

    public function getCodeclient(): ?string
    {
        return $this->codeclient;
    }

    public function setCodeclient(string $codeclient): static
    {
        $this->codeclient = $codeclient;

        return $this;
    }

    public function getCodefacture(): ?string
    {
        return $this->codefacture;
    }

    public function setCodefacture(string $codefacture): static
    {
        $this->codefacture = $codefacture;

        return $this;
    }

    public function getMontanttotalfacture(): ?string
    {
        return $this->montanttotalfacture;
    }

    public function setMontanttotalfacture(string $montanttotalfacture): static
    {
        $this->montanttotalfacture = $montanttotalfacture;

        return $this;
    }

    public function getMontantsaisie(): ?string
    {
        return $this->montantsaisie;
    }

    public function setMontantsaisie(string $montantsaisie): static
    {
        $this->montantsaisie = $montantsaisie;

        return $this;
    }

    public function getAncienmontant(): ?string
    {
        return $this->ancienmontant;
    }

    public function setAncienmontant(string $ancienmontant): static
    {
        $this->ancienmontant = $ancienmontant;

        return $this;
    }

    public function getPayetawa(): ?string
    {
        return $this->payetawa;
    }

    public function setPayetawa(string $payetawa): static
    {
        $this->payetawa = $payetawa;

        return $this;
    }

    public function getRestantmazal(): ?string
    {
        return $this->restantmazal;
    }

    public function setRestantmazal(string $restantmazal): static
    {
        $this->restantmazal = $restantmazal;

        return $this;
    }

    public function getDatemontant(): ?string
    {
        return $this->datemontant;
    }

    public function setDatemontant(string $datemontant): static
    {
        $this->datemontant = $datemontant;

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
}

<?php

namespace App\Entity;

use App\Repository\ErpCommandeClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: ErpCommandeClientRepository::class)]
class ErpCommandeClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monlogo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $masociete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monadresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomclient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $telclient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codedevis = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datedevis = null;

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

    // getters and setters

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

    public function getMonlogo(): ?string
    {
        return $this->monlogo;
    }

    public function setMonlogo(string $monlogo): static
    {
        $this->monlogo = $monlogo;

        return $this;
    }

    public function getMasociete(): ?string
    {
        return $this->masociete;
    }

    public function setMasociete(string $masociete): static
    {
        $this->masociete = $masociete;

        return $this;
    }

    public function getMonadresse(): ?string
    {
        return $this->monadresse;
    }

    public function setMonadresse(string $monadresse): static
    {
        $this->monadresse = $monadresse;

        return $this;
    }

    public function getMontel(): ?string
    {
        return $this->montel;
    }

    public function setMontel(string $montel): static
    {
        $this->montel = $montel;

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

    public function getCodedevis(): ?string
    {
        return $this->codedevis;
    }

    public function setCodedevis(string $codedevis): static
    {
        $this->codedevis = $codedevis;

        return $this;
    }

    public function getDatedevis(): ?string
    {
        return $this->datedevis;
    }

    public function setDatedevis(string $datedevis): static
    {
        $this->datedevis = $datedevis;

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

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getDatemodification(): ?\DateTimeInterface
    {
        return $this->datemodification;
    }

    public function setDatemodification(\DateTimeInterface $datemodification): self
    {
        $this->datemodification = $datemodification;

        return $this;
    }
}


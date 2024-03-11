<?php

namespace App\Entity;

use App\Repository\AvoirFournisseursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirFournisseursRepository::class)]
class AvoirFournisseurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeavoir = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codefournisseur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codefacture = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montantrestant = null;

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

    public function getCodeavoir(): ?string
    {
        return $this->codeavoir;
    }

    public function setCodeavoir(string $codeavoir): static
    {
        $this->codeavoir = $codeavoir;

        return $this;
    }

    public function getCodefournisseur(): ?string
    {
        return $this->codefournisseur;
    }

    public function setCodefournisseur(string $codefournisseur): static
    {
        $this->codefournisseur = $codefournisseur;

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

    public function getMontantrestant(): ?string
    {
        return $this->montantrestant;
    }

    public function setMontantrestant(string $montantrestant): static
    {
        $this->montantrestant = $montantrestant;

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

<?php

namespace App\Entity;

use App\Repository\ErpReleveBancaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpReleveBancaireRepository::class)]
class ErpReleveBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $solde = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datesolde = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fichierreleve = null;

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

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDatesolde(): ?string
    {
        return $this->datesolde;
    }

    public function setDatesolde(string $datesolde): static
    {
        $this->datesolde = $datesolde;

        return $this;
    }

    public function getFichierreleve(): ?string
    {
        return $this->fichierreleve;
    }

    public function setFichierreleve(string $fichierreleve): static
    {
        $this->fichierreleve = $fichierreleve;

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

<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRepository::class)]
class Operation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeoperation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tempsexecution = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $machine = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $gamme = null;

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

    public function getCodeoperation(): ?string
    {
        return $this->codeoperation;
    }

    public function setCodeoperation(string $codeoperation): static
    {
        $this->codeoperation = $codeoperation;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTempsexecution(): ?string
    {
        return $this->tempsexecution;
    }

    public function setTempsexecution(string $tempsexecution): static
    {
        $this->tempsexecution = $tempsexecution;

        return $this;
    }

    public function getMachine(): ?string
    {
        return $this->machine;
    }

    public function setMachine(string $machine): static
    {
        $this->machine = $machine;

        return $this;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme): static
    {
        $this->gamme = $gamme;

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

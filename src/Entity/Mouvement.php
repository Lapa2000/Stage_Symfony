<?php

namespace App\Entity;

use App\Repository\MouvementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MouvementRepository::class)]
class Mouvement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeproduit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $operation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ancienvaleur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nouvellevaleur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creepar = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datecreation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datemodification = null;

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

    public function getCodeproduit(): ?string
    {
        return $this->codeproduit;
    }

    public function setCodeproduit(string $codeproduit): static
    {
        $this->codeproduit = $codeproduit;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): static
    {
        $this->operation = $operation;

        return $this;
    }

    public function getAncienvaleur(): ?string
    {
        return $this->ancienvaleur;
    }

    public function setAncienvaleur(string $ancienvaleur): static
    {
        $this->ancienvaleur = $ancienvaleur;

        return $this;
    }

    public function getNouvellevaleur(): ?string
    {
        return $this->nouvellevaleur;
    }

    public function setNouvellevaleur(string $nouvellevaleur): static
    {
        $this->nouvellevaleur = $nouvellevaleur;

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

    public function getDatecreation(): ?string
    {
        return $this->datecreation;
    }

    public function setDatecreation(string $datecreation): static
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getDatemodification(): ?string
    {
        return $this->datemodification;
    }

    public function setDatemodification(string $datemodification): static
    {
        $this->datemodification = $datemodification;

        return $this;
    }
}

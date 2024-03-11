<?php

namespace App\Entity;

use App\Repository\ErpHeureSuppRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpHeureSuppRepository::class)]
class ErpHeureSupp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeemployee = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datedebut = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $datefin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $categorie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etat = null;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCodeemployee(): ?string
    {
        return $this->codeemployee;
    }

    public function setCodeemployee(string $codeemployee): static
    {
        $this->codeemployee = $codeemployee;

        return $this;
    }

    public function getDatedebut(): ?string
    {
        return $this->datedebut;
    }

    public function setDatedebut(string $datedebut): static
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?string
    {
        return $this->datefin;
    }

    public function setDatefin(string $datefin): static
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

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

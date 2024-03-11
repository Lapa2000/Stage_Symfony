<?php

namespace App\Entity;

use App\Repository\LigneFacturesFournisseurssRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneFacturesFournisseurssRepository::class)]
class LigneFacturesFournisseurss
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codedevis = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $produit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $quantite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prixdeventeht = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $remise = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tva = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $soustotalht = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $soustotalttc = null;

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

    public function getCodedevis(): ?string
    {
        return $this->codedevis;
    }

    public function setCodedevis(string $codedevis): static
    {
        $this->codedevis = $codedevis;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixdeventeht(): ?string
    {
        return $this->prixdeventeht;
    }

    public function setPrixdeventeht(string $prixdeventeht): static
    {
        $this->prixdeventeht = $prixdeventeht;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(string $remise): static
    {
        $this->remise = $remise;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(string $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

    public function getSoustotalht(): ?string
    {
        return $this->soustotalht;
    }

    public function setSoustotalht(string $soustotalht): static
    {
        $this->soustotalht = $soustotalht;

        return $this;
    }

    public function getSoustotalttc(): ?string
    {
        return $this->soustotalttc;
    }

    public function setSoustotalttc(string $soustotalttc): static
    {
        $this->soustotalttc = $soustotalttc;

        return $this;
    }
}

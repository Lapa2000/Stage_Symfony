<?php

namespace App\Entity;

use App\Repository\LigneFacturesFournisseursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneFacturesFournisseursRepository::class)]
class LigneFacturesFournisseurs
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
    private ?string $produit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prixunitaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $quantite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prixtotal = null;

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

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getPrixunitaire(): ?string
    {
        return $this->prixunitaire;
    }

    public function setPrixunitaire(string $prixunitaire): static
    {
        $this->prixunitaire = $prixunitaire;

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

    public function getPrixtotal(): ?string
    {
        return $this->prixtotal;
    }

    public function setPrixtotal(string $prixtotal): static
    {
        $this->prixtotal = $prixtotal;

        return $this;
    }
}

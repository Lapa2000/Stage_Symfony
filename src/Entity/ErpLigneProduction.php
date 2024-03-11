<?php

namespace App\Entity;

use App\Repository\ErpLigneProductionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpLigneProductionRepository::class)]
class ErpLigneProduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codeligne = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $refproduit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ancienqte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $newqte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sortie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $restant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $dateligne = null;

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

    public function getCodeligne(): ?string
    {
        return $this->codeligne;
    }

    public function setCodeligne(string $codeligne): static
    {
        $this->codeligne = $codeligne;

        return $this;
    }

    public function getRefproduit(): ?string
    {
        return $this->refproduit;
    }

    public function setRefproduit(string $refproduit): static
    {
        $this->refproduit = $refproduit;

        return $this;
    }

    public function getAncienqte(): ?string
    {
        return $this->ancienqte;
    }

    public function setAncienqte(string $ancienqte): static
    {
        $this->ancienqte = $ancienqte;

        return $this;
    }

    public function getNewqte(): ?string
    {
        return $this->newqte;
    }

    public function setNewqte(string $newqte): static
    {
        $this->newqte = $newqte;

        return $this;
    }

    public function getSortie(): ?string
    {
        return $this->sortie;
    }

    public function setSortie(string $sortie): static
    {
        $this->sortie = $sortie;

        return $this;
    }

    public function getRestant(): ?string
    {
        return $this->restant;
    }

    public function setRestant(string $restant): static
    {
        $this->restant = $restant;

        return $this;
    }

    public function getDateligne(): ?string
    {
        return $this->dateligne;
    }

    public function setDateligne(string $dateligne): static
    {
        $this->dateligne = $dateligne;

        return $this;
    }
}

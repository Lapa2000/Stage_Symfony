<?php

namespace App\Entity;

use App\Repository\ErpMouvementStockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpMouvementStockRepository::class)]
class ErpMouvementStock
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
    private ?string $ancienqte = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $newquantitetonne = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $newquantitequnto = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $newquantitekilo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $newvalue = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type = null;

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

    public function getAncienqte(): ?string
    {
        return $this->ancienqte;
    }

    public function setAncienqte(string $ancienqte): static
    {
        $this->ancienqte = $ancienqte;

        return $this;
    }

    public function getNewquantitetonne(): ?string
    {
        return $this->newquantitetonne;
    }

    public function setNewquantitetonne(string $newquantitetonne): static
    {
        $this->newquantitetonne = $newquantitetonne;

        return $this;
    }

    public function getNewquantitequnto(): ?string
    {
        return $this->newquantitequnto;
    }

    public function setNewquantitequnto(string $newquantitequnto): static
    {
        $this->newquantitequnto = $newquantitequnto;

        return $this;
    }

    public function getNewquantitekilo(): ?string
    {
        return $this->newquantitekilo;
    }

    public function setNewquantitekilo(string $newquantitekilo): static
    {
        $this->newquantitekilo = $newquantitekilo;

        return $this;
    }

    public function getNewvalue(): ?string
    {
        return $this->newvalue;
    }

    public function setNewvalue(string $newvalue): static
    {
        $this->newvalue = $newvalue;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

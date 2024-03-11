<?php

namespace App\Entity;

use App\Repository\ErpParametresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpParametresRepository::class)]
class ErpParametres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $logosociete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nomsociete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codepostal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tel2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fax = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $registrecommerce = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $matriculefiscale = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $rib = null;

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

    public function getLogosociete(): ?string
    {
        return $this->logosociete;
    }

    public function setLogosociete(string $logosociete): static
    {
        $this->logosociete = $logosociete;

        return $this;
    }

    public function getNomsociete(): ?string
    {
        return $this->nomsociete;
    }

    public function setNomsociete(string $nomsociete): static
    {
        $this->nomsociete = $nomsociete;

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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): static
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(string $tel2): static
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getRegistrecommerce(): ?string
    {
        return $this->registrecommerce;
    }

    public function setRegistrecommerce(string $registrecommerce): static
    {
        $this->registrecommerce = $registrecommerce;

        return $this;
    }

    public function getMatriculefiscale(): ?string
    {
        return $this->matriculefiscale;
    }

    public function setMatriculefiscale(string $matriculefiscale): static
    {
        $this->matriculefiscale = $matriculefiscale;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): static
    {
        $this->rib = $rib;

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

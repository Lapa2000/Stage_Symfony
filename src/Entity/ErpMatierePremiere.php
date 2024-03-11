<?php

namespace App\Entity;

use App\Repository\ErpMatierePremiereRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpMatierePremiereRepository::class)]
class ErpMatierePremiere
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
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $categorie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $methodeapprovisionement = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $puvht = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tva = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $puvttc = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $remisemax = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $unitestock = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fournisseur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateachat = null;

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

    public function getCodeproduit(): ?string
    {
        return $this->codeproduit;
    }

    public function setCodeproduit(string $codeproduit): static
    {
        $this->codeproduit = $codeproduit;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMethodeapprovisionement(): ?string
    {
        return $this->methodeapprovisionement;
    }

    public function setMethodeapprovisionement(string $methodeapprovisionement): static
    {
        $this->methodeapprovisionement = $methodeapprovisionement;

        return $this;
    }

    public function getPuvht(): ?string
    {
        return $this->puvht;
    }

    public function setPuvht(string $puvht): static
    {
        $this->puvht = $puvht;

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

    public function getPuvttc(): ?string
    {
        return $this->puvttc;
    }

    public function setPuvttc(string $puvttc): static
    {
        $this->puvttc = $puvttc;

        return $this;
    }

    public function getRemisemax(): ?string
    {
        return $this->remisemax;
    }

    public function setRemisemax(string $remisemax): static
    {
        $this->remisemax = $remisemax;

        return $this;
    }

    public function getUnitestock(): ?string
    {
        return $this->unitestock;
    }

    public function setUnitestock(string $unitestock): static
    {
        $this->unitestock = $unitestock;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getDateachat(): ?\DateTimeInterface
    {
        return $this->dateachat;
    }

    public function setDateachat(\DateTimeInterface $dateachat): static
    {
        $this->dateachat = $dateachat;

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

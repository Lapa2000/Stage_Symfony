<?php

namespace App\Entity;

use App\Repository\ErpClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpClientRepository::class)]
class ErpClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $anciencode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $typearrive = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $surnom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prenomdeux = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $pays = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ville = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $codepostal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $raisonsocial = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $registrecommerce = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $matriculefiscal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $rib = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $intervenanttype = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $intervenantnom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cheque = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tel2 = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $fax = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $website = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creepar = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
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

    public function getAnciencode(): ?string
    {
        return $this->anciencode;
    }

    public function setAnciencode(string $anciencode): static
    {
        $this->anciencode = $anciencode;

        return $this;
    }

    public function getTypearrive(): ?string
    {
        return $this->typearrive;
    }

    public function setTypearrive(string $typearrive): static
    {
        $this->typearrive = $typearrive;

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(string $surnom): static
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getPrenomdeux(): ?string
    {
        return $this->prenomdeux;
    }

    public function setPrenomdeux(string $prenomdeux): static
    {
        $this->prenomdeux = $prenomdeux;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): static
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getRaisonsocial(): ?string
    {
        return $this->raisonsocial;
    }

    public function setRaisonsocial(string $raisonsocial): static
    {
        $this->raisonsocial = $raisonsocial;

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

    public function getMatriculefiscal(): ?string
    {
        return $this->matriculefiscal;
    }

    public function setMatriculefiscal(string $matriculefiscal): static
    {
        $this->matriculefiscal = $matriculefiscal;

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

    public function getIntervenanttype(): ?string
    {
        return $this->intervenanttype;
    }

    public function setIntervenanttype(string $intervenanttype): static
    {
        $this->intervenanttype = $intervenanttype;

        return $this;
    }

    public function getIntervenantnom(): ?string
    {
        return $this->intervenantnom;
    }

    public function setIntervenantnom(string $intervenantnom): static
    {
        $this->intervenantnom = $intervenantnom;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getCheque(): ?string
    {
        return $this->cheque;
    }

    public function setCheque(string $cheque): static
    {
        $this->cheque = $cheque;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

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

<?php

namespace App\Entity;

use App\Repository\ErpDevisFournisseursNewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErpDevisFournisseursNewRepository::class)]
class ErpDevisFournisseursNew
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
    private ?string $masociete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monadresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monfax = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monregistre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $monmatricule = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientcode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientraison = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientnom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientprenom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clienttel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientfax = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientadresse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $clientmatricule = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totalht = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totaltva = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $remises = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $timbres = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totalttc = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $chauffeurnom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $chauffeurvehicule = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creationcode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creationnom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creationprenom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creationdate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $creationheure = null;

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

    public function getMasociete(): ?string
    {
        return $this->masociete;
    }

    public function setMasociete(string $masociete): static
    {
        $this->masociete = $masociete;

        return $this;
    }

    public function getMonadresse(): ?string
    {
        return $this->monadresse;
    }

    public function setMonadresse(string $monadresse): static
    {
        $this->monadresse = $monadresse;

        return $this;
    }

    public function getMontel(): ?string
    {
        return $this->montel;
    }

    public function setMontel(string $montel): static
    {
        $this->montel = $montel;

        return $this;
    }

    public function getMonfax(): ?string
    {
        return $this->monfax;
    }

    public function setMonfax(string $monfax): static
    {
        $this->monfax = $monfax;

        return $this;
    }

    public function getMonregistre(): ?string
    {
        return $this->monregistre;
    }

    public function setMonregistre(string $monregistre): static
    {
        $this->monregistre = $monregistre;

        return $this;
    }

    public function getMonmatricule(): ?string
    {
        return $this->monmatricule;
    }

    public function setMonmatricule(string $monmatricule): static
    {
        $this->monmatricule = $monmatricule;

        return $this;
    }

    public function getClientcode(): ?string
    {
        return $this->clientcode;
    }

    public function setClientcode(string $clientcode): static
    {
        $this->clientcode = $clientcode;

        return $this;
    }

    public function getClientraison(): ?string
    {
        return $this->clientraison;
    }

    public function setClientraison(string $clientraison): static
    {
        $this->clientraison = $clientraison;

        return $this;
    }

    public function getClientnom(): ?string
    {
        return $this->clientnom;
    }

    public function setClientnom(string $clientnom): static
    {
        $this->clientnom = $clientnom;

        return $this;
    }

    public function getClientprenom(): ?string
    {
        return $this->clientprenom;
    }

    public function setClientprenom(string $clientprenom): static
    {
        $this->clientprenom = $clientprenom;

        return $this;
    }

    public function getClienttel(): ?string
    {
        return $this->clienttel;
    }

    public function setClienttel(string $clienttel): static
    {
        $this->clienttel = $clienttel;

        return $this;
    }

    public function getClientfax(): ?string
    {
        return $this->clientfax;
    }

    public function setClientfax(string $clientfax): static
    {
        $this->clientfax = $clientfax;

        return $this;
    }

    public function getClientadresse(): ?string
    {
        return $this->clientadresse;
    }

    public function setClientadresse(string $clientadresse): static
    {
        $this->clientadresse = $clientadresse;

        return $this;
    }

    public function getClientmatricule(): ?string
    {
        return $this->clientmatricule;
    }

    public function setClientmatricule(string $clientmatricule): static
    {
        $this->clientmatricule = $clientmatricule;

        return $this;
    }

    public function getTotalht(): ?string
    {
        return $this->totalht;
    }

    public function setTotalht(string $totalht): static
    {
        $this->totalht = $totalht;

        return $this;
    }

    public function getTotaltva(): ?string
    {
        return $this->totaltva;
    }

    public function setTotaltva(string $totaltva): static
    {
        $this->totaltva = $totaltva;

        return $this;
    }

    public function getRemises(): ?string
    {
        return $this->remises;
    }

    public function setRemises(string $remises): static
    {
        $this->remises = $remises;

        return $this;
    }

    public function getTimbres(): ?string
    {
        return $this->timbres;
    }

    public function setTimbres(string $timbres): static
    {
        $this->timbres = $timbres;

        return $this;
    }

    public function getTotalttc(): ?string
    {
        return $this->totalttc;
    }

    public function setTotalttc(string $totalttc): static
    {
        $this->totalttc = $totalttc;

        return $this;
    }

    public function getChauffeurnom(): ?string
    {
        return $this->chauffeurnom;
    }

    public function setChauffeurnom(string $chauffeurnom): static
    {
        $this->chauffeurnom = $chauffeurnom;

        return $this;
    }

    public function getChauffeurvehicule(): ?string
    {
        return $this->chauffeurvehicule;
    }

    public function setChauffeurvehicule(string $chauffeurvehicule): static
    {
        $this->chauffeurvehicule = $chauffeurvehicule;

        return $this;
    }

    public function getCreationcode(): ?string
    {
        return $this->creationcode;
    }

    public function setCreationcode(string $creationcode): static
    {
        $this->creationcode = $creationcode;

        return $this;
    }

    public function getCreationnom(): ?string
    {
        return $this->creationnom;
    }

    public function setCreationnom(string $creationnom): static
    {
        $this->creationnom = $creationnom;

        return $this;
    }

    public function getCreationprenom(): ?string
    {
        return $this->creationprenom;
    }

    public function setCreationprenom(string $creationprenom): static
    {
        $this->creationprenom = $creationprenom;

        return $this;
    }

    public function getCreationdate(): ?string
    {
        return $this->creationdate;
    }

    public function setCreationdate(string $creationdate): static
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    public function getCreationheure(): ?string
    {
        return $this->creationheure;
    }

    public function setCreationheure(string $creationheure): static
    {
        $this->creationheure = $creationheure;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NavireRepository::class)]
class Navire
{
    #[Assert\Unique(fields:['imo', 'mmsi', 'indicatifAppel'])]
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(name:'imo', length: 7)]
    #[Assert\Regex('[1-9][0-9]{6}', message:'Le numero IMO doit être unique et composé de 7 chiffre sans commencer par zero')]
    private ?string $imo = null;

    #[ORM\Column(length: 60)]
    private ?string $nom = null;

    #[ORM\Column(length: 9)]
    private ?string $mmsi = null;

    #[ORM\Column(length: 10)]
    private ?string $indicatifAppel = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eta = null;

    #[ORM\Column]
    #[Assert\Range(
            min: 1,
            notInRangeMessage: 'La longueur doit etre positive',
    )]
    private ?int $longueur = null;

    #[ORM\Column]
    #[Assert\Range(
            min: 1,
            notInRangeMessage: 'La largeur doit etre positive',
    )]
    private ?int $largeur = null;

    #[ORM\Column]
    private ?float $tirantdeau = null;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColumn(name:'idaisshiptype', referencedColumnName:'id', nullable: false)]
    private ?AisShipType $aisShipType = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:'idpays', referencedColumnName:'id', nullable: false)]
    private ?Pays $pavillon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImo(): ?string
    {
        return $this->imo;
    }

    public function setImo(string $imo): static
    {
        $this->imo = $imo;

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

    public function getMmsi(): ?string
    {
        return $this->mmsi;
    }

    public function setMmsi(string $mmsi): static
    {
        $this->mmsi = $mmsi;

        return $this;
    }

    public function getIndicatifAppel(): ?string
    {
        return $this->indicatifAppel;
    }

    public function setIndicatifAppel(string $indicatifAppel): static
    {
        $this->indicatifAppel = $indicatifAppel;

        return $this;
    }

    public function getEta(): ?\DateTimeInterface
    {
        return $this->eta;
    }

    public function setEta(?\DateTimeInterface $eta): static
    {
        $this->eta = $eta;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getTirantdeau(): ?float
    {
        return $this->tirantdeau;
    }

    public function setTirantdeau(float $tirantdeau): static
    {
        $this->tirantdeau = $tirantdeau;

        return $this;
    }

    public function getTypeNavire(): ?AisShipType
    {
        return $this->typeNavire;
    }

    public function setTypeNavire(?AisShipType $typeNavire): static
    {
        $this->typeNavire = $typeNavire;

        return $this;
    }

    public function getPavillon(): ?Pays
    {
        return $this->pavillon;
    }

    public function setPavillon(?Pays $pavillon): static
    {
        $this->pavillon = $pavillon;

        return $this;
    }
}

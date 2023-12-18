<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortRepository::class)]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $nom = null;

    #[ORM\Column(length: 5)]
    private ?string $Indicatif = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIndicatif(): ?string
    {
        return $this->Indicatif;
    }

    public function setIndicatif(string $Indicatif): static
    {
        $this->Indicatif = $Indicatif;

        return $this;
    }
}

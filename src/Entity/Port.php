<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortRepository::class)]
#[Assert\Unique(fields:['indicatifs'])]
#[ORM\Index(name:'ind_INDICATIF', columns:['indicatif'])]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (name:'id')]
    private ?int $id = null;

    #[ORM\Column(name: 'nom',length: 70)]
    private ?string $nom = null;

    #[ORM\Column(name:'indicatif',length: 5)]
    #[ORM\Regex(pattern:"/[A-Z]{5}/", massage:"L'indicatif Port a strictement 5 caracteres")]
    private ?string $Indicatif = null;

    #[ORM\ManyToMany(targetEntity: AisShiptype::class, inversedBy: 'portsCompatibles')]
    #[ORM\JoinTable(name:'porttypecompatible')]
    #[ORM\JoinColumn(name:'idport', referencedColumnName:'id')]
    #[ORM\InverseJoinColumn(name:'idaisshiptype', referencedColumnName:'id')]
    private Collection $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, AisShiptype>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(AisShiptype $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(AisShiptype $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }
}

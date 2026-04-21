<?php

namespace App\Entity;

use App\Repository\MaterielSoireeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielSoireeRepository::class)]
class MaterielSoiree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateReservation = null;

    #[ORM\ManyToOne(targetEntity: Materiel::class, inversedBy: 'materielSoirees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materiel $materiel = null;

    #[ORM\ManyToOne(targetEntity: Soiree::class, inversedBy: 'materielSoirees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Soiree $soiree = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeImmutable
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeImmutable $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): static
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getSoiree(): ?Soiree
    {
        return $this->soiree;
    }

    public function setSoiree(?Soiree $soiree): static
    {
        $this->soiree = $soiree;

        return $this;
    }
}

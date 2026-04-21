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

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateReservationDebut = null;
    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateReservationFin = null;

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

    public function getDateReservationDebut(): ?\DateTimeImmutable
    {
        return $this->dateReservationDebut;
    }

    public function setDateReservationDebut(\DateTimeImmutable $dateReservationDebut): static
    {
        $this->dateReservationDebut = $dateReservationDebut;

        return $this;
    }

    public function getDateReservationFin(): ?\DateTimeImmutable
    {
        return $this->dateReservationFin;
    }

    public function setDateReservationFin(\DateTimeImmutable $dateReservationFin): static
    {
        $this->dateReservationFin = $dateReservationFin;

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

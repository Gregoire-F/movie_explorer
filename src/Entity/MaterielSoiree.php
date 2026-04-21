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
    private ?\DateTimeImmutable $dateReservationDebut = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateReservationFin = null;

    #[ORM\Column(length: 100)]
    private ?string $materiel = null;

    #[ORM\Column(length: 100)]
    private ?string $soiree = null;

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

    public function getMateriel(): ?string
    {
        return $this->materiel;
    }

    public function setMateriel(string $materiel): static
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getSoiree(): ?string
    {
        return $this->soiree;
    }

    public function setSoiree(string $soiree): static
    {
        $this->soiree = $soiree;

        return $this;
    }
}

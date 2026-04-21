<?php

namespace App\Entity;

use App\Entity\Artiste;
use App\Repository\SoireeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SoireeRepository::class)]
class Soiree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // #[ORM\Column(length: 255)]
    // private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 5,
        max: 65,
        minMessage: 'Ce titre est trop court.',
        maxMessage: 'Ce titre est trop long.'
    )]
    #[Assert\NotBlank(message: 'Le titre ne peut pas être vide.')]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateSoiree = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\ManyToOne(targetEntity: Theme::class, inversedBy: 'soirees')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Theme $theme = null;

    // ✅ AJOUT : la relation ManyToMany sur une propriété
    #[ORM\ManyToMany(targetEntity: Artiste::class, inversedBy: 'soirees')]
    #[ORM\JoinTable(name: 'soiree_artiste')]
    private Collection $artistes;

    #[ORM\OneToMany(targetEntity: MaterielSoiree::class, mappedBy: 'soiree')]
    private Collection $materielSoirees;

    // ✅ AJOUT : initialiser la collection dans le constructeur
    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->materielSoirees = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateSoiree(): ?\DateTimeImmutable
    {
        return $this->dateSoiree;
    }

    public function setDateSoiree(\DateTimeImmutable $dateSoiree): static
    {
        $this->dateSoiree = $dateSoiree;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }
        // ✅ AJOUT : getters/setters pour artistes
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): static
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes->add($artiste);
        }
        return $this;
    }

    public function removeArtiste(Artiste $artiste): static
    {
        $this->artistes->removeElement($artiste);
        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): static
    {
        $this->theme = $theme;
        return $this;
    }

    public function getMaterielSoirees(): Collection
    {
        return $this->materielSoirees;
    }

    public function addMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if (!$this->materielSoirees->contains($materielSoiree)) {
            $this->materielSoirees->add($materielSoiree);
            $materielSoiree->setSoiree($this);
        }
        return $this;
    }

    public function removeMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if ($this->materielSoirees->removeElement($materielSoiree)) {
            if ($materielSoiree->getSoiree() === $this) {
                $materielSoiree->setSoiree(null);
            }
        }
        return $this;
    }
}

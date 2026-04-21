<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    private string $name = '';

    #[ORM\OneToMany(targetEntity: Soiree::class, mappedBy: 'theme')]
    private Collection $soirees;

    public function __construct()
    {
        $this->soirees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSoirees(): Collection
    {
        return $this->soirees;
    }

    public function addSoiree(Soiree $soiree): static
    {
        if (!$this->soirees->contains($soiree)) {
            $this->soirees->add($soiree);
            $soiree->setTheme($this);
        }
        return $this;
    }

}

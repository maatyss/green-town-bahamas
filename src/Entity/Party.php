<?php

namespace App\Entity;

use App\Repository\PartyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartyRepository::class)]
class Party
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $startAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $theme;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $placesAvaibles;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $entryPrice;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $djSet;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isDisplayed;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'parties')]
    private $creator;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cover = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    public function setStartAt(?\DateTimeInterface $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPlacesAvaibles(): ?string
    {
        return $this->placesAvaibles;
    }

    public function setPlacesAvaibles(?string $placesAvaibles): self
    {
        $this->placesAvaibles = $placesAvaibles;

        return $this;
    }

    public function getEntryPrice(): ?int
    {
        return $this->entryPrice;
    }

    public function setEntryPrice(?int $entryPrice): self
    {
        $this->entryPrice = $entryPrice;

        return $this;
    }

    public function getDjSet(): ?string
    {
        return $this->djSet;
    }

    public function setDjSet(?string $djSet): self
    {
        $this->djSet = $djSet;

        return $this;
    }

    public function isIsDisplayed(): ?bool
    {
        return $this->isDisplayed;
    }

    public function setIsDisplayed(?bool $isDisplayed): self
    {
        $this->isDisplayed = $isDisplayed;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getcover(): ?string
    {
        return $this->cover;
    }

    public function setcover(?string $cover): static
    {
        $this->cover = $cover;

        return $this;
    }
}

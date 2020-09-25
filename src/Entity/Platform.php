<?php

namespace App\Entity;

use App\Repository\PlatformRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatformRepository::class)
 */
class Platform
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $launch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $generation;

    /**
     * @ORM\OneToMany(targetEntity=Launch::class, mappedBy="platform", orphanRemoval=true)
     */
    private $games;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="platforms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    public function __construct()
    {
        $this->games = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLaunch(): ?\DateTimeInterface
    {
        return $this->launch;
    }

    public function setLaunch(\DateTimeInterface $launch): self
    {
        $this->launch = $launch;

        return $this;
    }

    public function getGeneration(): ?string
    {
        return $this->generation;
    }

    public function setGeneration(string $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    /**
     * @return Collection|Launch[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Launch $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setPlatform($this);
        }

        return $this;
    }

    public function removeGame(Launch $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
            // set the owning side to null (unless already changed)
            if ($game->getPlatform() === $this) {
                $game->setPlatform(null);
            }
        }

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}

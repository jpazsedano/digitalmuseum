<?php

namespace App\Entity;

use App\Repository\VideogameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideogameRepository::class)
 */
class Videogame
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="developed_videogames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $developer;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="distributed_videogames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distributor;

    /**
     * @ORM\OneToMany(targetEntity=Launch::class, mappedBy="videogame", orphanRemoval=true)
     */
    private $launch;

    /**
     * @ORM\ManyToMany(targetEntity=GameList::class, mappedBy="videogames")
     */
    private $gameLists;

    /**
     * @ORM\OneToMany(targetEntity=Gallery::class, mappedBy="videogame")
     */
    private $galleries;

    public function __construct()
    {
        $this->launch = new ArrayCollection();
        $this->gameLists = new ArrayCollection();
        $this->galleries = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function setLaunch(\DateTimeInterface $launch): self
    {
        $this->launch = $launch;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDeveloper(): ?Company
    {
        return $this->developer;
    }

    public function setDeveloper(?Company $developer): self
    {
        $this->developer = $developer;

        return $this;
    }

    public function getDistributor(): ?Company
    {
        return $this->distributor;
    }

    public function setDistributor(?Company $distributor): self
    {
        $this->distributor = $distributor;

        return $this;
    }

    public function addLaunch(Launch $launch): self
    {
        if (!$this->launch->contains($launch)) {
            $this->launch[] = $launch;
            $launch->setVideogame($this);
        }

        return $this;
    }

    public function removeLaunch(Launch $launch): self
    {
        if ($this->launch->contains($launch)) {
            $this->launch->removeElement($launch);
            // set the owning side to null (unless already changed)
            if ($launch->getVideogame() === $this) {
                $launch->setVideogame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Launch[]
     */
    public function getLaunch(): Collection
    {
        return $this->launch;
    }

    /**
     * @return Collection|GameList[]
     */
    public function getGameLists(): Collection
    {
        return $this->gameLists;
    }

    public function addGameList(GameList $gameList): self
    {
        if (!$this->gameLists->contains($gameList)) {
            $this->gameLists[] = $gameList;
            $gameList->addVideogame($this);
        }

        return $this;
    }

    public function removeGameList(GameList $gameList): self
    {
        if ($this->gameLists->contains($gameList)) {
            $this->gameLists->removeElement($gameList);
            $gameList->removeVideogame($this);
        }

        return $this;
    }

    /**
     * @return Collection|Gallery[]
     */
    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
            $gallery->setVideogame($this);
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        if ($this->galleries->contains($gallery)) {
            $this->galleries->removeElement($gallery);
            // set the owning side to null (unless already changed)
            if ($gallery->getVideogame() === $this) {
                $gallery->setVideogame(null);
            }
        }

        return $this;
    }
}

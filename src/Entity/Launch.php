<?php

namespace App\Entity;

use App\Repository\LaunchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LaunchRepository::class)
 */
class Launch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Videogame::class, inversedBy="launch")
     * @ORM\JoinColumn(nullable=false)
     */
    private $videogame;

    /**
     * @ORM\ManyToOne(targetEntity=Platform::class, inversedBy="games")
     * @ORM\JoinColumn(nullable=false)
     */
    private $platform;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $front_picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getVideogame(): ?Videogame
    {
        return $this->videogame;
    }

    public function setVideogame(?Videogame $videogame): self
    {
        $this->videogame = $videogame;

        return $this;
    }

    public function getPlatform(): ?Platform
    {
        return $this->platform;
    }

    public function setPlatform(?Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getFrontPicture(): ?string
    {
        return $this->front_picture;
    }

    public function setFrontPicture(?string $front_picture): self
    {
        $this->front_picture = $front_picture;

        return $this;
    }
}

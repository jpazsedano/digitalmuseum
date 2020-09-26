<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $foundation_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $close_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="child_companies")
     */
    private $parent_company;

    /**
     * @ORM\OneToMany(targetEntity=Company::class, mappedBy="parent_company")
     */
    private $child_companies;

    /**
     * @ORM\OneToMany(targetEntity=Videogame::class, mappedBy="developer")
     */
    private $developed_videogames;

    /**
     * @ORM\OneToMany(targetEntity=Videogame::class, mappedBy="distributor")
     */
    private $distributed_videogames;

    /**
     * @ORM\OneToMany(targetEntity=Platform::class, mappedBy="company")
     */
    private $platforms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo_image;

    public function __construct()
    {
        $this->child_companies = new ArrayCollection();
        $this->developed_videogames = new ArrayCollection();
        $this->distributed_videogames = new ArrayCollection();
        $this->platforms = new ArrayCollection();
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

    public function getFoundationDate(): ?\DateTimeInterface
    {
        return $this->foundation_date;
    }

    public function setFoundationDate(\DateTimeInterface $foundation_date): self
    {
        $this->foundation_date = $foundation_date;

        return $this;
    }

    public function getCloseDate(): ?\DateTimeInterface
    {
        return $this->close_date;
    }

    public function setCloseDate(?\DateTimeInterface $close_date): self
    {
        $this->close_date = $close_date;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getParentCompany(): ?self
    {
        return $this->parent_company;
    }

    public function setParentCompany(?self $parent_company): self
    {
        $this->parent_company = $parent_company;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildCompanies(): Collection
    {
        return $this->child_companies;
    }

    public function addChildCompany(self $childCompany): self
    {
        if (!$this->child_companies->contains($childCompany)) {
            $this->child_companies[] = $childCompany;
            $childCompany->setParentCompany($this);
        }

        return $this;
    }

    public function removeChildCompany(self $childCompany): self
    {
        if ($this->child_companies->contains($childCompany)) {
            $this->child_companies->removeElement($childCompany);
            // set the owning side to null (unless already changed)
            if ($childCompany->getParentCompany() === $this) {
                $childCompany->setParentCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Videogame[]
     */
    public function getDevelopedVideogames(): Collection
    {
        return $this->developed_videogames;
    }

    public function addDevelopedVideogame(Videogame $developedVideogame): self
    {
        if (!$this->developed_videogames->contains($developedVideogame)) {
            $this->developed_videogames[] = $developedVideogame;
            $developedVideogame->setDeveloper($this);
        }

        return $this;
    }

    public function removeDevelopedVideogame(Videogame $developedVideogame): self
    {
        if ($this->developed_videogames->contains($developedVideogame)) {
            $this->developed_videogames->removeElement($developedVideogame);
            // set the owning side to null (unless already changed)
            if ($developedVideogame->getDeveloper() === $this) {
                $developedVideogame->setDeveloper(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Videogame[]
     */
    public function getDistributedVideogames(): Collection
    {
        return $this->distributed_videogames;
    }

    public function addDistributedVideogame(Videogame $distributedVideogame): self
    {
        if (!$this->distributed_videogames->contains($distributedVideogame)) {
            $this->distributed_videogames[] = $distributedVideogame;
            $distributedVideogame->setDistributor($this);
        }

        return $this;
    }

    public function removeDistributedVideogame(Videogame $distributedVideogame): self
    {
        if ($this->distributed_videogames->contains($distributedVideogame)) {
            $this->distributed_videogames->removeElement($distributedVideogame);
            // set the owning side to null (unless already changed)
            if ($distributedVideogame->getDistributor() === $this) {
                $distributedVideogame->setDistributor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatforms(): Collection
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms[] = $platform;
            $platform->setCompany($this);
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platforms->contains($platform)) {
            $this->platforms->removeElement($platform);
            // set the owning side to null (unless already changed)
            if ($platform->getCompany() === $this) {
                $platform->setCompany(null);
            }
        }

        return $this;
    }

    public function getLogoImage(): ?string
    {
        return $this->logo_image;
    }

    public function setLogoImage(?string $logo_image): self
    {
        $this->logo_image = $logo_image;

        return $this;
    }
}

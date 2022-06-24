<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $BrandName;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $CountryName;

    /**
     * @ORM\OneToMany(targetEntity=Model::class, mappedBy="BrandName", orphanRemoval=true)
     */
    private $Models;

    public function __construct()
    {
        $this->Models = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandName(): ?string
    {
        return $this->BrandName;
    }

    public function setBrandName(string $BrandName): self
    {
        $this->BrandName = $BrandName;

        return $this;
    }

    public function getCountryName(): ?Country
    {
        return $this->CountryName;
    }

    public function setCountryName(?Country $CountryName): self
    {
        $this->CountryName = $CountryName;

        return $this;
    }

    /**
     * @return Collection<int, Model>
     */
    public function getModels(): Collection
    {
        return $this->Models;
    }

    public function addModel(Model $model): self
    {
        if (!$this->Models->contains($model)) {
            $this->Models[] = $model;
            $model->setBrandName($this);
        }

        return $this;
    }

    public function removeModel(Model $model): self
    {
        if ($this->Models->removeElement($model)) {
            // set the owning side to null (unless already changed)
            if ($model->getBrandName() === $this) {
                $model->setBrandName(null);
            }
        }

        return $this;
    }
    
    public function __toString(){

        return strval( $this->getBrandName());
    }
}

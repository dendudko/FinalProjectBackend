<?php

namespace App\Entity;

use App\Repository\PartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartRepository::class)
 */
class Part
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $PartName;

    /**
     * @ORM\Column(type="float")
     */
    private $PartPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Manufacturer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ManufacturerName;

    /**
     * @ORM\ManyToMany(targetEntity=Car::class, inversedBy="parts")
     */
    private $CarName;

    public function __construct()
    {
        $this->CarName = new ArrayCollection();
        $this->Car = new ArrayCollection();
        $this->parts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartName(): ?string
    {
        return $this->PartName;
    }

    public function setPartName(string $PartName): self
    {
        $this->PartName = $PartName;

        return $this;
    }

    public function getPartPrice(): ?float
    {
        return $this->PartPrice;
    }

    public function setPartPrice(float $PartPrice): self
    {
        $this->PartPrice = $PartPrice;

        return $this;
    }

    public function getManufacturerName(): ?Manufacturer
    {
        return $this->ManufacturerName;
    }

    public function setManufacturerName(?Manufacturer $ManufacturerName): self
    {
        $this->ManufacturerName = $ManufacturerName;

        return $this;
    }

    public function __toString(){

        return strval( $this->getPartName());
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCarName(): Collection
    {
        return $this->CarName;
    }

    public function addCarName(Car $carName): self
    {
        if (!$this->CarName->contains($carName)) {
            $this->CarName[] = $carName;
        }

        return $this;
    }

    public function removeCarName(Car $carName): self
    {
        $this->CarName->removeElement($carName);

        return $this;
    }

}

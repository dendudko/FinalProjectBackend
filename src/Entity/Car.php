<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $EngineName;

    /**
     * @ORM\Column(type="integer")
     */
    private $ReleaseDate;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $TransmissionType;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $DriveType;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ModelName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $VIN;

    /**
     * @ORM\ManyToMany(targetEntity=Part::class, mappedBy="CarName")
     */
    private $parts;

    public function __construct()
    {
        $this->PartName = new ArrayCollection();
        $this->parts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEngineName(): ?string
    {
        return $this->EngineName;
    }

    public function setEngineName(string $EngineName): self
    {
        $this->EngineName = $EngineName;

        return $this;
    }

    public function getReleaseDate(): ?int
    {
        return $this->ReleaseDate;
    }

    public function setReleaseDate(int $ReleaseDate): self
    {
        $this->ReleaseDate = $ReleaseDate;

        return $this;
    }

    public function getTransmissionType(): ?string
    {
        return $this->TransmissionType;
    }

    public function setTransmissionType(string $TransmissionType): self
    {
        $this->TransmissionType = $TransmissionType;

        return $this;
    }

    public function getDriveType(): ?string
    {
        return $this->DriveType;
    }

    public function setDriveType(string $DriveType): self
    {
        $this->DriveType = $DriveType;

        return $this;
    }

    public function getModelName(): ?Model
    {
        return $this->ModelName;
    }

    public function setModelName(?Model $ModelName): self
    {
        $this->ModelName = $ModelName;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(string $VIN): self
    {
        $this->VIN = $VIN;

        return $this;
    }
    
    public function __toString(){

        return strval( $this->getModelName().' '.$this->getVIN());
    }

    /**
     * @return Collection<int, Part>
     */
    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function addPart(Part $part): self
    {
        if (!$this->parts->contains($part)) {
            $this->parts[] = $part;
            $part->addCarName($this);
        }

        return $this;
    }

    public function removePart(Part $part): self
    {
        if ($this->parts->removeElement($part)) {
            $part->removeCarName($this);
        }

        return $this;
    }

}

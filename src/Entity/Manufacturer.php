<?php

namespace App\Entity;

use App\Repository\ManufacturerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ManufacturerRepository::class)
 */
class Manufacturer
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
    private $ManufacturerName;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $CountryName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManufacturerName(): ?string
    {
        return $this->ManufacturerName;
    }

    public function setManufacturerName(string $ManufacturerName): self
    {
        $this->ManufacturerName = $ManufacturerName;

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
    
    
    public function __toString(){

        return strval( $this->getManufacturerName());
    }
}

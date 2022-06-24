<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
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
    private $ModelName;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="Models")
     * @ORM\JoinColumn(nullable=false)
     */
    private $BrandName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelName(): ?string
    {
        return $this->ModelName;
    }

    public function setModelName(string $ModelName): self
    {
        $this->ModelName = $ModelName;

        return $this;
    }

    public function getBrandName(): ?Brand
    {
        return $this->BrandName;
    }

    public function setBrandName(?Brand $BrandName): self
    {
        $this->BrandName = $BrandName;

        return $this;
    }
    
    public function __toString(){

        return strval( $this->getBrandName().' '.$this->getModelName());
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CentreCommercialRepository")
 */
class CentreCommercial extends Immobilier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Cantine", inversedBy="centres", cascade={"persist"})
     * @Assert\Valid()
     */
    private $cantines;

    public function __construct(){
        parent::__construct();
        $this->cantines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        // return $this->id;
        return parent::getId();
    }

     /**
     * @return Collection|Cantine[]
     */
    public function getCantines(): Collection
    {
        return $this->cantines;
    }

    public function addCantine(Cantine $cantine): self
    {
        if (!$this->cantines->contains($cantine)) {
            $this->cantines[] = $cantine;
        }

        return $this;
    }

    public function removeCantine(Cantine $cantine): self
    {
        if ($this->cantines->contains($cantine)) {
            $this->cantines->removeElement($cantine);
        }

        return $this;
    }
}

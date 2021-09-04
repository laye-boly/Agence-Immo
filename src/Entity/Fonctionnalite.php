<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionnaliteRepository")
 */
class Fonctionnalite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonctionnalite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Immobilier", mappedBy="fonctionnalites")
     */
    private $immobiliers;

    public function __construct()
    {
        $this->immobiliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFonctionnalite(): ?string
    {
        return $this->fonctionnalite;
    }

    public function setFonctionnalite(string $fonctionnalite): self
    {
        $this->fonctionnalite = $fonctionnalite;

        return $this;
    }

    /**
     * @return Collection|Immobilier[]
     */
    public function getImmobiliers(): Collection
    {
        return $this->immobiliers;
    }

    public function addImmobilier(Immobilier $immobilier): self
    {
        if (!$this->immobiliers->contains($immobilier)) {
            $this->immobiliers[] = $immobilier;
            $immobilier->addFonctionnalite($this);
        }

        return $this;
    }

    public function removeImmobilier(Immobilier $immobilier): self
    {
        if ($this->immobiliers->contains($immobilier)) {
            $this->immobiliers->removeElement($immobilier);
            $immobilier->removeFonctionnalite($this);
        }

        return $this;
    }
}

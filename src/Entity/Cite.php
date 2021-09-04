<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CiteRepository")
 */
class Cite extends Immobilier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Maison", inversedBy="cites", cascade={"persist"})
     * @Assert\Valid()
     */
    private $maisons;

    public function __construct(){
        parent::__construct();
        $this->maisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        // return $this->id;
        return parent::getId();
        
    }

     /**
     * @return Collection|Maison[]
     */
    public function getMaisons(): Collection
    {
        return $this->maisons;
    }

    public function addMaison(Maison $maison): self
    {
        if (!$this->maisons->contains($maison)) {
            $this->maisons[] = $maison;
        }

        return $this;
    }

    public function removeMaison(Maison $maison): self
    {
        if ($this->maisons->contains($maison)) {
            $this->maisons->removeElement($maison);
        }

        return $this;
    }
}

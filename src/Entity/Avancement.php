<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AvancementRepository")
 */
class Avancement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $avancement;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\Range(
     *                  min=1,
     *                  max=100,
     *                  minMessage="La valeur minimal du pourcentage est {{ limit }}",
     *                  maxMessage="La valeur maximal du pourcentage est {{ limit }}"
     * )
     */
    private $pourcentage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Immobilier", inversedBy="avancements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $immobilier;

    public function __construct()
    {
        $this->immobiliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvancement(): ?string
    {
        return $this->avancement;
    }

    public function setAvancement(string $avancement): self
    {
        $this->avancement = $avancement;

        return $this;
    }

    public function getPourcentage(): ?int
    {
        return $this->pourcentage;
    }

    public function setPourcentage(int $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getImmobilier(): ?Immobilier
    {
        return $this->immobilier;
    }

    public function setImmobilier(?Immobilier $immobilier): self
    {
        $this->immobilier = $immobilier;
        $this->immobilier->addAvancement($this);

        return $this;
    }

     

    
}

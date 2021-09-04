<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class ImmobilierSearchSelling {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $fonctionnalites;
    
    /**
     * @var string|null
     */
    private $address;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeChambres;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeSallesDeBain;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeEtages;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeCuisines;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeSalons;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeGarages;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDePiscines;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeJardins;

    /**
     * @var string
     */
    private $selling;

    /**
     * @var string
     */
    private $active;

    

    

    public function __construct()
    {
        $this->fonctionnalites = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return ImmobilierSearchSelling
     */
    public function setMaxPrice(int $maxPrice): ImmobilierSearchSelling
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @param int|null $minSurface
     * @return ImmobilierSearchSelling
     */
    public function setMinSurface(int $minSurface): ImmobilierSearchSelling
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @return ArrayCollection
     */
    public function getFonctionnalites(): ArrayCollection
    {
        return $this->fonctionnalites;
    }

    /**
     * @param ArrayCollection $fonctionnalites
     */
    public function setFonctionnalites(ArrayCollection $fonctionnalites): void
    {
        $this->fonctionnalites = $fonctionnalites;
    }

     /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     * @return ImmobilierSearchSelling
     */
    public function setAddress(?string $address): ImmobilierSearchSelling
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param int|null $nbreDeChambres
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeChambres(int $nbreDeChambres): ImmobilierSearchSelling
    {
        $this->nbreDeChambres = $nbreDeChambres;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeChambres(): ?int
    {
        return $this->nbreDeChambres;
    }

    /**
     * @param int|null $nbreDeSallesDeBain
     * @return ImmobilierSearchSelling
     */
    public function setbreDeSallesDeBain(int $nbreDeSallesDeBain): ImmobilierSearchSelling
    {
        $this->nbreDeSallesDeBain = $nbreDeSallesDeBain;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeSallesDeBain(): ?int
    {
        return $this->nbreDeSallesDeBain;
    }

    /**
     * @param int|null $nbreDeEtages
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeEtages(int $nbreDeEtages): ImmobilierSearchSelling
    {
        $this->nbreDeEtages = $nbreDeEtages;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeEtages(): ?int
    {
        return $this->nbreDeEtages;
    }

    /**
     * @param int|null $nbreDeCuisines
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeCuisines(int $nbreDeCuisines): ImmobilierSearchSelling
    {
        $this->nbreDeCuisines = $nbreDeCuisines;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeCuisines(): ?int
    {
        return $this->nbreDeCuisines;
    }

    /**
     * @param int|null $nbreDeSalons
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeSalons(int $nbreDeSalons): ImmobilierSearchSelling
    {
        $this->nbreDeSalons = $nbreDeSalons;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeSalons(): ?int
    {
        return $this->nbreDeSalons;
    }

    /**
     * @param int|null $nbreDeGarages
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeGarages(int $nbreDeGarages): ImmobilierSearchSelling
    {
        $this->nbreDeGarages = $nbreDeGarages;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeGarages(): ?int
    {
        return $this->nbreDeGarages;
    }

    /**
     * @param int|null $nbreDeGarages
     * @return ImmobilierSearchSelling
     */
    public function setNbreDePiscines(int $nbreDePiscines): ImmobilierSearchSelling
    {
        $this->nbreDePiscines = $nbreDePiscines;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDePiscines(): ?int
    {
        return $this->nbreDePiscines;
    }

     /**
     * @param int|null $nbreDeJardins
     * @return ImmobilierSearchSelling
     */
    public function setNbreDeJardins(int $nbreDeJardins): ImmobilierSearchSelling
    {
        $this->nbreDeJardins = $nbreDeJardins;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeJardins(): ?int
    {
        return $this->nbreDeJardins;
    }

     /**
     * @return string
     */
    public function getSelling(): ?string
    {
        return $this->selling;
    }

    /**
     * @param string $selling
     * @return ImmobilierSearchSelling
     */
    public function setSelling(?string $selling): ImmobilierSearchSelling
    {
        $this->selling = $selling;
        return $this;
    }

    /**
     * @return string
     */
    public function getActive(): ?string
    {
        return $this->active;
    }

    /**
     * @param string $active
     * @return ImmobilierSearchSelling
     */
    public function setActive(?string $active): ImmobilierSearchSelling
    {
        $this->active = $active;
        return $this;
    }


}

<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class ImmobilierSearchRenting{

    /**
     * @var int|null
     */
    private $maxPriceRenting;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurfaceRenting;

    /**
     * @var ArrayCollection
     */
    private $fonctionnalitesRenting;
    
    /**
     * @var string|null
     */
    private $addressRenting;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeChambresRenting;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeSallesDeBainRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeEtagesRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeCuisinesRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeSalonsRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeGaragesRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDePiscinesRenting;

     /**
     * @var int|null
     * @Assert\Range(min=1, max=10)
     */
    private $nbreDeJardinsRenting;

    /**
     * @var string
     */
    private $renting;

    /**
     * @var string
     */
    private $activeRenting;

    

    

    public function __construct()
    {
        $this->fonctionnalitesRenting = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPriceRenting(): ?int
    {
        return $this->maxPriceRenting;
    }

    /**
     * @param int|null $maxPriceRenting
     * @return ImmobilierSearchRenting
     */
    public function setMaxPriceRenting(int $maxPriceRenting): ImmobilierSearchRenting
    {
        $this->maxPriceRenting = $maxPriceRenting;
        return $this;
    }

    /**
     * @param int|null $minSurfaceRenting
     * @return ImmobilierSearchRenting
     */
    public function setMinSurfaceRenting(int $minSurfaceRenting): ImmobilierSearchRenting
    {
        $this->minSurfaceRenting = $minSurfaceRenting;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurfaceRenting(): ?int
    {
        return $this->minSurfaceRenting;
    }

    /**
     * @return ArrayCollection
     */
    public function getFonctionnalitesRenting(): ArrayCollection
    {
        return $this->fonctionnalitesRenting;
    }

    /**
     * @param ArrayCollection $fonctionnalites
     */
    public function setFonctionnalitesRenting(ArrayCollection $fonctionnalitesRenting): void
    {
        $this->fonctionnalitesRenting = $fonctionnalitesRenting;
    }

     /**
     * @return null|string
     */
    public function getAddressRenting(): ?string
    {
        return $this->addressRenting;
    }

    /**
     * @param null|string $addressRenting
     * @return ImmobilierSearchRenting
     */
    public function setAddressRenting(?string $addressRenting): ImmobilierSearchRenting
    {
        $this->addressRenting = $addressRenting;
        return $this;
    }

    /**
     * @param int|null $nbreDeChambresRenting
     * @return ImmobilierSearchRenting
     */
    public function setNbreDeChambresRenting(int $nbreDeChambresRenting): ImmobilierSearchRenting
    {
        $this->nbreDeChambresRenting = $nbreDeChambresRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeChambresRenting(): ?int
    {
        return $this->nbreDeChambresRenting;
    }

    /**
     * @param int|null $nbreDeSallesDeBainRenting
     * @return ImmobilierSearchRenting
     */
    public function setNreDeSallesDeBainRenting(int $nbreDeSallesDeBainRenting): ImmobilierSearchRenting
    {
        $this->nbreDeSallesDeBainRenting = $nbreDeSallesDeBainRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeSallesDeBainRenting(): ?int
    {
        return $this->nbreDeSallesDeBainRenting;
    }

    /**
     * @param int|null $nbreDeEtagesRenting
     * @return ImmobilierSearchRenting
     */
    public function setNbreDeEtagesRenting(int $nbreDeEtagesRenting): ImmobilierSearchRenting
    {
        $this->nbreDeEtagesRenting = $nbreDeEtagesRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeEtagesRenting(): ?int
    {
        return $this->nbreDeEtagesRenting;
    }

    /**
    * @param int|null $nbreDeCuisinesRenting
    * @return ImmobilierSearchRenting
    */
    public function setNbreDeCuisinesRenting(int $nbreDeCuisinesRenting): ImmobilierSearchRenting
    {
        $this->nbreDeCuisinesRenting = $nbreDeCuisinesRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeCuisinesRenting(): ?int
    {
        return $this->nbreDeCuisinesRenting;
    }

    /**
     * @param int|null $nbreDeSalonsRenting
     * @return ImmobilierSearchRenting
     */
    public function setNbreDeSalonsRenting(int $nbreDeSalonsRenting): ImmobilierSearchRenting
    {
        $this->nbreDeSalonsRenting = $nbreDeSalonsRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeSalonsRenting(): ?int
    {
        return $this->nbreDeSalonsRenting;
    }

    /**
     * @param int|null $nbreDeGarages
     * @return ImmobilierSearchRenting
     */
    public function setNbreDeGarages(int $nbreDeGaragesRenting): ImmobilierSearchRenting
    {
        $this->nbreDeGaragesRenting = $nbreDeGaragesRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeGaragesRenting(): ?int
    {
        return $this->nbreDeGaragesRenting;
    }

    /**
     * @param int|null $nbreDeGarages
     * @return ImmobilierSearchRenting
     */
    public function setNbreDePiscinesRenting(int $nbreDePiscinesRenting): ImmobilierSearchRenting
    {
        $this->nbreDePiscinesRenting = $nbreDePiscinesRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDePiscinesRenting(): ?int
    {
        return $this->nbreDePiscinesRenting;
    }

     /**
     * @param int|null $nbreDeJardinsRenting
     * @return ImmobilierSearchRenting
     */
    public function setNbreDeJardins(int $nbreDeJardinsRenting): ImmobilierSearchRenting
    {
        $this->nbreDeJardinsRenting = $nbreDeJardinsRenting;
        return $this;
    }


    /**
     * @return int|null
     */
    public function getNbreDeJardinsRenting(): ?int
    {
        return $this->nbreDeJardinsRenting;
    }

     /**
     * @return string
     */
    public function getRenting(): ?string
    {
        return $this->renting;
    }

    /**
     * @param string $renting
     * @return ImmobilierSearchRenting
     */
    public function setRenting(?string $renting): ImmobilierSearchRenting
    {
        $this->renting = $renting;
        return $this;
    }
   
    /**
     * @return string
     */
    public function getActiveRenting(): ?string
    {
        return $this->activeRenting;
    }

    /**
     * @param string $activeRenting
     * @return ImmobilierSearchRenting
     */
    public function setActiveRenting(?string $activeRenting): ImmobilierSearchRenting
    {
        $this->activeRenting = $activeRenting;
        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaisonRepository")
 */
class Maison
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
     * @Assert\Length(
     *               min=10, 
     *               max=255, 
     *               minMessage="Le type de maison est court. Il doit faire au moins {{ limit }} caractères"
     * )
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *                min=100, 
     *                minMessage="La description de la maison doit faire au moins {{ limit }} caractères."
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $chambres;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $sallesDeBain;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $etages;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $cuisines;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $salons;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $garages;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $piscines;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $jardins;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Cite", mappedBy="maisons")
     */
    private $cites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="maison", cascade={"persist"})
     * @Assert\Valid()
     */

    
    private $images;

    /**
     * @Assert\All({
     *   @Assert\Image(
     *                  mimeTypes={"image/jpeg", "image/png"},
     *                  mimeTypesMessage="Le format du fichier est invalide. Seuls les formats jpeg et png sont autorisés."
     * )
     * })
     */
    private $pictureFiles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreTypeMaison;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreMaisonALouer;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreMaisonAVendre;

    public function __construct(){
        $this->images = new ArrayCollection();
        $this->cites = new ArrayCollection();
        $this->setUpdateAt(new \DateTime("now"));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): self
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getSallesDeBain(): ?int
    {
        return $this->sallesDeBain;
    }

    public function setSallesDeBain(int $sallesDeBain): self
    {
        $this->sallesDeBain = $sallesDeBain;

        return $this;
    }

    public function getEtages(): ?int
    {
        return $this->etages;
    }

    public function setEtages(int $etages): self
    {
        $this->etages = $etages;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCuisines(): ?int
    {
        return $this->cuisines;
    }

    public function setCuisines(int $cuisines): self
    {
        $this->cuisines = $cuisines;

        return $this;
    }

    public function getSalons(): ?int
    {
        return $this->salons;
    }

    public function setSalons(int $salons): self
    {
        $this->salons = $salons;

        return $this;
    }

    public function getGarages(): ?int
    {
        return $this->garages;
    }

    public function setGarages(int $garages): self
    {
        $this->garages = $garages;

        return $this;
    }

    public function getPiscines(): ?int
    {
        return $this->piscines;
    }

    public function setPiscines(int $piscines): self
    {
        $this->piscines = $piscines;

        return $this;
    }

    public function getJardins(): ?int
    {
        return $this->jardins;
    }

    public function setJardins(int $jardins): self
    {
        $this->jardins = $jardins;

        return $this;
    }

    /**
     * @return Collection|Cite[]
     */
    public function getCites(): Collection
    {
        return $this->cites;
    }

    public function addCite(Cite $cite): self
    {
        if (!$this->cites->contains($cite)) {
            $this->cites[] = $cite;
            $cite->addMaison($this);
        }

        return $this;
    }

    public function removeCite(Cite $cite): self
    {
        if ($this->cites->contains($cite)) {
            $this->cites->removeElement($cite);
            $cite->removeMaison($this);
        }

        return $this;
    }


    
     /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setMaison($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getMaison() === $this) {
                $image->setMaison(null);
            }
        }

        return $this;
    }

    
     /**
     * @return mixed
     */
    public function getPictureFiles()
    {
        return $this->pictureFiles;
    }

    /**
     * @param mixed $pictureFiles
     * @return Maison
     */
    public function setPictureFiles($pictureFiles): self
    {
        foreach($pictureFiles as $pictureFile) {
            $image = new Image();
            $image->setImageFile($pictureFile);
            $this->addImage($image);
        }
        $this->pictureFiles = $pictureFiles;
        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
    
/**
* @ORM\PreUpdate
*/
  public function preUpdate()
  {
      
        $this->setUpdateAt(new \Datetime());
  }

  public function getNbreTypeMaison(): ?int
  {
      return $this->nbreTypeMaison;
  }

  public function setNbreTypeMaison(int $nbreTypeMaison): self
  {
      $this->nbreTypeMaison = $nbreTypeMaison;

      return $this;
  }

  public function getNbreMaisonALouer(): ?int
  {
      return $this->nbreMaisonALouer;
  }

  public function setNbreMaisonALouer(int $nbreMaisonALouer): self
  {
      $this->nbreMaisonALouer = $nbreMaisonALouer;

      return $this;
  }

  public function getNbreMaisonAVendre(): ?int
  {
      return $this->nbreMaisonAVendre;
  }

  public function setNbreMaisonAVendre(int $nbreMaisonAVendre): self
  {
      $this->nbreMaisonAVendre = $nbreMaisonAVendre;

      return $this;
  }
}

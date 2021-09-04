<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AppartementRepository")
 */
class Appartement
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
     *               minMessage="Le type d'appartement est court. Il doit faire au moins {{ limit }} caractères"
     * )
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *                min=100, 
     *                minMessage="La description de l'appartement doit faire au moins {{ limit }} caractères."
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Immeuble", mappedBy="appartements")
     */
    private $immeubles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="appartement", cascade={"persist"})
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
    private $updateAt ;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreTypeAppartement;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreAppartALouer;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $nbreAppartAVendre;

    public function __construct()
    {
        $this->immeubles = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    /**
     * @return Collection|Immeuble[]
     */
    public function getImmeubles(): Collection
    {
        return $this->immeubles;
    }

    public function addImmeuble(Immeuble $immeuble): self
    {
        if (!$this->immeubles->contains($immeuble)) {
            $this->immeubles[] = $immeuble;
            $immeuble->addAppartement($this);
        }

        return $this;
    }

    public function removeImmeuble(Immeuble $immeuble): self
    {
        if ($this->immeubles->contains($immeuble)) {
            $this->immeubles->removeElement($immeuble);
            $immeuble->removeAppartement($this);
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
            $image->setAppartement($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getAppartement() === $this) {
                $image->setAppartement(null);
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
     * @return Appartement
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

  public function getNbreTypeAppartement(): ?int
  {
      return $this->nbreTypeAppartement;
  }

  public function setNbreTypeAppartement(int $nbreTypeAppartement): self
  {
      $this->nbreTypeAppartement = $nbreTypeAppartement;

      return $this;
  }

  public function getNbreAppartALouer(): ?int
  {
      return $this->nbreAppartALouer;
  }

  public function setNbreAppartALouer(int $nbreAppartALouer): self
  {
      $this->nbreAppartALouer = $nbreAppartALouer;

      return $this;
  }

  public function getNbreAppartAVendre(): ?int
  {
      return $this->nbreAppartAVendre;
  }

  public function setNbreAppartAVendre(int $nbreAppartAVendre): self
  {
      $this->nbreAppartAVendre = $nbreAppartAVendre;

      return $this;
  }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CantineRepository")
 */
class Cantine
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
     *               minMessage="Le type de cantine est court. Il doit faire au moins {{ limit }} caractères"
     * )
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *                min=100, 
     *                minMessage="La description de la cantine doit faire au moins {{ limit }} caractères."
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $surface;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="cantine", cascade={"persist"})
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
     * @ORM\ManyToMany(targetEntity="App\Entity\CentreCommercial", mappedBy="cantines")
     */
    private $centres;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreTypeCantine;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreCantineAvendre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreCantineALouer;

    public function __construct(){
        $this->images = new ArrayCollection();
        $this->centres = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

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
            $image->setCantine($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getCantine() === $this) {
                $image->setCantine(null);
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
     * @return Cantine
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

     /**
     * @return Collection|CentreCommercial[]
     */
    public function getCentres(): Collection
    {
        return $this->centres;
    }

    public function addCentre(CentreCommercial $centre): self
    {
        if (!$this->centres->contains($centre)) {
            $this->centres[] = $centre;
            $centre->addCantine($this);
        }

        return $this;
    }

    public function removeCentre(CentreCommercial $centre): self
    {
        if ($this->centres->contains($centre)) {
            $this->centres->removeElement($centre);
            $centre->removeCantine($this);
        }

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

  public function getNbreTypeCantine(): ?int
  {
      return $this->nbreTypeCantine;
  }

  public function setNbreTypeCantine(int $nbreTypeCantine): self
  {
      $this->nbreTypeCantine = $nbreTypeCantine;

      return $this;
  }

  public function getNbreCantineAvendre(): ?int
  {
      return $this->nbreCantineAvendre;
  }

  public function setNbreCantineAvendre(int $nbreCantineAvendre): self
  {
      $this->nbreCantineAvendre = $nbreCantineAvendre;

      return $this;
  }

  public function getNbreCantineALouer(): ?int
  {
      return $this->nbreCantineALouer;
  }

  public function setNbreCantineALouer(int $nbreCantineALouer): self
  {
      $this->nbreCantineALouer = $nbreCantineALouer;

      return $this;
  }

}

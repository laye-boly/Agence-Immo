<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Cocur\Slugify\Slugify;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImmobilierRepository")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({
 * "immobilier" = "Immobilier", 
 * "centrecommerciale" = "CentreCommercial", 
 * "cite" = "Cite",
 * "immeuble" = "Immeuble"
 * })
 * @Vich\Uploadable()
 */

class Immobilier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *                min=100, 
     *                minMessage="La description du bien immobilier doit faire au moins {{ limit }} caractères."
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *               min=10, 
     *               max=255, 
     *               minMessage="Le titre est court. Il doit faire au moins {{ limit }} caractères"
     * )
     */
    private $titre;

    

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $debutTravaux;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $livraison;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avancement", mappedBy="immobilier", orphanRemoval=true, cascade={"persist"})
     * @Assert\Valid()
     */
    private $avancements;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fonctionnalite", inversedBy="immobiliers", cascade={"persist"})
     * @Assert\Valid()
     */
    private $fonctionnalites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="immobilier", cascade={"persist", "remove"})
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
     * @ORM\Column(type="datetime", options={"default" : "1900-05-10 10:00:13"})
     */
    private $updateAt;

    /**
     * @ORM\Column(type="string", length=255, options={"default" : "en_cours"})
     */
    private $etat;


    /**
     * @ORM\Column(type="integer")
     
     */
    
    private $nbreLocals;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    public function __construct()
    {
        $this->avancements = new ArrayCollection();
        $this->fonctionnalites = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->setUpdateAt(new \DateTime("now"));
    }


   
    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    

    public function getDebutTravaux(): ?string
    {
        return $this->debutTravaux;
    }

    public function setDebutTravaux(string $debutTravaux): self
    {
        $this->debutTravaux = $debutTravaux;

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * @return Collection|Avancement[]
     */
    public function getAvancements(): Collection
    {
        return $this->avancements;
    }

    public function addAvancement(Avancement $avancement): self
    {
        if (!$this->avancements->contains($avancement)) {
            $this->avancements[] = $avancement;
            
        }

        return $this;
    }

    public function removeAvancement(Avancement $avancement): self
    {
        if ($this->avancements->contains($avancement)) {
            $this->avancements->removeElement($avancement);
            // set the owning side to null (unless already changed)
            if ($avancement->getImmobilier() === $this) {
                $avancement->setImmobilier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fonctionnalite[]
     */
    public function getFonctionnalites(): Collection
    {
        return $this->fonctionnalites;
    }

    public function addFonctionnalite(Fonctionnalite $fonctionnalite): self
    {
        if (!$this->fonctionnalites->contains($fonctionnalite)) {
            $this->fonctionnalites[] = $fonctionnalite;
        }

        return $this;
    }

    public function removeFonctionnalite(Fonctionnalite $fonctionnalite): self
    {
        if ($this->fonctionnalites->contains($fonctionnalite)) {
            $this->fonctionnalites->removeElement($fonctionnalite);
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
            $image->setImmobilier($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getImmobilier() === $this) {
                $image->setImmobilier(null);
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
     * @return Immobilier
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

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->titre);
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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNbreLocals(): ?int
    {
        return $this->nbreLocals;
    }
  
    public function setNbreLocals(int $nbreLocals): self
    {
        $this->nbreLocals = $nbreLocals;
  
        return $this;
    }

    

    /**
    * @ORM\PreUpdate
    */
    public function preUpdate()
    {
        
            $this->setUpdateAt(new \Datetime());
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

  

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable()
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @var File|null
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/png"},
     *     mimeTypesMessage="Le format du fichier est invalide. Seuls les formats jpeg et png sont autorisés."
     * )
     * @Vich\UploadableField(mapping="immobilier_images", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Immobilier", inversedBy="images")
     */
    private $immobilier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Appartement", inversedBy="images")
     */
    private $appartement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Maison", inversedBy="images")
     */
    private $maison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cantine", inversedBy="images")
     */
    private $cantine;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getImmobilier(): ?Immobilier
    {
        return $this->immobilier;
    }

    public function setImmobilier(?Immobilier $immobilier): self
    {
        $this->immobilier = $immobilier;

        return $this;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): self
    {
        $this->appartement = $appartement;

        return $this;
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param null|File $imageFile
     * @return self
     */
    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {

            if($this->immobilier != null){
                
                $this->immobilier->setUpdateAt(new \DateTime('now'));
            
            } else if($this->cantine != null){
                $this->cantine->setUpdateAt(new \DateTime('now'));
            }
            else if($this->appartement != null){
                $this->appartement->setUpdateAt(new \DateTime('now'));
            }
            else if($this->maison != null){
                $this->maison->setUpdateAt(new \DateTime('now'));
            }

           
        }
        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    
    public function getMaison(): ?Maison
    {
        return $this->maison;
    }

    public function setMaison(?Maison $maison): self
    {
        $this->maison = $maison;

        return $this;
    }

    public function getCantine(): ?Cantine
    {
        return $this->cantine;
    }

    public function setCantine(?Cantine $cantine): self
    {
        $this->cantine = $cantine;

        return $this;
    }

    
}

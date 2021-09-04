<?php
namespace App\Services;
use App\Entity\Immobilier;
use App\Entity\Appartement;
use App\Entity\Cantine;
use App\Entity\Maison;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use App\Form\ImmobilierSearchSellingType;
use App\Form\ImmobilierSearchRentingType;

class FindLogements{

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    
    public function getAppartementsAVendre(ImmobilierSearchSelling $immobilierSearchSelling){

        if($immobilierSearchSelling->getActive() == "appartements"){
            return $this->em->getRepository(Appartement::class)->findSellingAppartementsByCriteria($immobilierSearchSelling);
        } 
        else{
            return $this->em->getRepository(Appartement::class)->findSellingAppartements();
        }
    }

    public function getAppartementsALouer(ImmobilierSearchRenting $immobilierSearchRenting){

        if($immobilierSearchRenting->getActiveRenting() == "appartements"){
            return $this->em->getRepository(Appartement::class)->findRentingAppartementsByCriteria($immobilierSearchRenting);
        } 
        else{
            return $this->em->getRepository(Appartement::class)->findRentingAppartements();
        }
    }

    public function getMaisonsAVendre(ImmobilierSearchSelling $immobilierSearchSelling){

        if($immobilierSearchSelling->getActive() == "maisons"){
            return $this->em->getRepository(Maison::class)->findSellingMaisonsByCriteria($immobilierSearchSelling);
        } 
        else{
            return $this->em->getRepository(Maison::class)->findSellingMaisons();
        }
    }

    public function getMaisonsALouer(ImmobilierSearchRenting $immobilierSearchRenting){

        if($immobilierSearchRenting->getActiveRenting() == "maisons"){
            return $this->em->getRepository(Maison::class)->findRentingMaisonsByCriteria($immobilierSearchRenting);
        } 
        else{
            return $this->em->getRepository(Maison::class)->findRentingMaisons();
        }

    }

    public function getCantinesAVendre(ImmobilierSearchSelling $immobilierSearchSelling){

        if($immobilierSearchSelling->getActive() == "cantines"){
            return $this->em->getRepository(Cantine::class)->findSellingCantinesByCriteria($immobilierSearchSelling);
        } 
        else{
            return $this->em->getRepository(Cantine::class)->findSellingCantines();
        }
    }

    public function getCantinesALouer(ImmobilierSearchRenting $immobilierSearchRenting){

        if($immobilierSearchRenting->getActiveRenting() == "cantines"){
            return $this->em->getRepository(Cantine::class)->findRentingCantinesByCriteria($immobilierSearchRenting);
        } 
        else{
            return  $this->em->getRepository(Cantine::class)->findRentingCantines();
        }

    }



}
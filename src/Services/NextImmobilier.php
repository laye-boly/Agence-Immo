<?php
namespace App\Services;
use App\Entity\Immobilier;
use Doctrine\ORM\EntityManagerInterface;

class NextImmobilier{

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    /* 
    * $from : la ligne à partir de laquelle on récupère les immobiliers
    * $number : le nombre d'immeubles à récupérer
    */
    public function getNextImmobilier($from, $number){

        return $this->em->getRepository(Immobilier::class)->findIdTitreDescription($from, $number);
    }
}
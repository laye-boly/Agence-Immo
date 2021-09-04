<?php
namespace App\Services;
use App\Entity\Immobilier;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\FindLogements;
use Symfony\Component\Form\FormFactoryInterface;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use App\Form\ImmobilierSearchSellingType;
use App\Form\ImmobilierSearchRentingType;
use Symfony\Component\HttpFoundation\Request;

class TemplateVariables{

    private $em;
    private $findLogements;
    private $formFactory;

    public function __construct(EntityManagerInterface $em, FindLogements $findLogements, FormFactoryInterface $formFactory){
        $this->em = $em;
        $this->findLogements = $findLogements;
        $this->formFactory = $formFactory;
    }

   
    public function getVariables(Request $request){

        $immobilierSearchSelling = new ImmobilierSearchSelling();
        $immobilierSearchRenting = new ImmobilierSearchRenting();
        $formSelling = $this->formFactory->create(ImmobilierSearchSellingType::class, $immobilierSearchSelling);
        $formSelling->handleRequest($request);
        $formRenting = $this->formFactory->create(ImmobilierSearchRentingType::class, $immobilierSearchRenting);
        $formRenting->handleRequest($request);
        $appartementsALouer = $this->findLogements->getAppartementsAVendre($immobilierSearchSelling);
        $appartementsAVendre = $this->findLogements->getAppartementsALouer($immobilierSearchRenting);
        $maisonsAVendre = $this->findLogements->getMaisonsAVendre($immobilierSearchSelling);
        $maisonsALouer = $this->findLogements->getMaisonsALouer($immobilierSearchRenting);
        $cantinesAVendre = $this->findLogements->getCantinesAVendre($immobilierSearchSelling);
        $cantinesALouer = $this->findLogements->getCantinesALouer($immobilierSearchRenting);
        
        return [

            'appartementsALouer' => $appartementsALouer,
            'appartementsAVendre' => $appartementsAVendre,
            'cantinesALouer' => $cantinesALouer,
            'cantinesAVendre' => $cantinesAVendre,
            'maisonsALouer' => $maisonsALouer,
            'maisonsAVendre' => $maisonsAVendre,
            'form_selling' => $formSelling->createView(),
            'form_renting' => $formRenting->createView(),
            
        ];
    }
}
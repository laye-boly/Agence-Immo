<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ImmobilierRepository;
use App\Entity\Immobilier;
use App\Entity\Appartement;
use App\Entity\Cantine;
use App\Entity\Maison;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use App\Form\ImmobilierSearchSellingType;
use App\Form\ImmobilierSearchRentingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\NextImmobilier;
use App\Services\FindLogements;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
    private $em;
    private $session;
    private $nextImmobilier;
    private $findLogements;

    public function __construct(EntityManagerInterface $em, SessionInterface $session, NextImmobilier $nextImmobilier, FindLogements $findLogements ){
        $this->em = $em;
        $this->session = $session;
        $this->nextImmobilier = $nextImmobilier;
        $this->findLogements = $findLogements;
    
    }

    /**
     * @Route("/", name="home.index"
     * )
    */
    public function index(Request $request)
    {
        $from = 0;
        $number = 3;
        $immobilierSearchSelling = new ImmobilierSearchSelling();
        $immobilierSearchRenting = new ImmobilierSearchRenting();
        $formSelling = $this->createForm(ImmobilierSearchSellingType::class, $immobilierSearchSelling);
        $formSelling->handleRequest($request);
        $formRenting = $this->createForm(ImmobilierSearchRentingType::class, $immobilierSearchRenting);
        $formRenting->handleRequest($request);
        $appartementsALouer = $this->findLogements->getAppartementsAVendre($immobilierSearchSelling);
        $appartementsAVendre = $this->findLogements->getAppartementsALouer($immobilierSearchRenting);
        $maisonsAVendre = $this->findLogements->getMaisonsAVendre($immobilierSearchSelling);
        $maisonsALouer = $this->findLogements->getMaisonsALouer($immobilierSearchRenting);
        $cantinesAVendre = $this->findLogements->getCantinesAVendre($immobilierSearchSelling);
        $cantinesALouer = $this->findLogements->getCantinesALouer($immobilierSearchRenting);
       
        $immobiliers = $this->nextImmobilier->getNextImmobilier($from, $number);
        $minId = $this->getMinimunTable($this->getImmobilierIdTable($immobiliers));
  
        $from = $from + $number ;
        return $this->render('home.html.twig', [
            'immobiliers' => $immobiliers,
            'from' => $from,
            'number' => $number,
            'minId' => $minId,
            'appartementsALouer' => $appartementsALouer,
            'appartementsAVendre' => $appartementsAVendre,
            'cantinesALouer' => $cantinesALouer,
            'cantinesAVendre' => $cantinesAVendre,
            'maisonsALouer' => $maisonsALouer,
            'maisonsAVendre' => $maisonsAVendre,
            'form_selling' => $formSelling->createView(),
            'form_renting' => $formRenting->createView()

        ]);

    }

    /**
     * @Route("/next/immobiliers", name="home.next.immobiliers"
     * )
    */
    public function nextImmobiliers(Request $request)
    {
        $from = intval($request->get('from'));
        $number = intval($request->get('number'));
        $totalImmobilier = $this->em->getRepository(Immobilier::class)->getTotalImmobiliers();
        if($from >= ($totalImmobilier - 1) ){
            $from = 0;
        }
        $immobiliers = $this->nextImmobilier->getNextImmobilier($from, $number);
        $minId = $this->getMinimunTable($this->getImmobilierIdTable($immobiliers));
        // dd($minId);
        $immobiliersTables = array();
        foreach($immobiliers as $immobilier){
            $immobilierTable = array();
            $immobilierTable["id"] = $immobilier->getId();
            $immobilierTable["titre"] = $immobilier->getTitre();
            $immobilierTable["description"] = $immobilier->getDescription();
            if($immobilier->getImages()[0] != null){
                $immobilierTable['image'] = $immobilier->getImages()[0]->getFilename();
            }else{
                $immobilierTable['image'] = null;
            }
            $immobiliersTables[] = $immobilierTable;
       }
      
        $reponse =  new JsonResponse([
                'number' => $number,
                'from' => $from,
                'immobiliers' => $immobiliersTables,
                'minId' => $minId
                     
                
            ]);
          
        return $reponse;
    }

    private function getMinimunTable($table){
        return min($table);
    }

    private function getImmobilierIdTable($immobiliers){
        $tableId = array();
        foreach($immobiliers as $immobilier){
            $tableId[] = $immobilier->getId();
        }
        return $tableId;
    }

    // private function getMaximumTable($table){
    //     return max($table);
    // }

   
}
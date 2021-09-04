<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Immobilier;
use App\Entity\Contact;
use App\Services\FindLogements;
use App\Services\TemplateVariables;
use App\Entity\ImmobilierSearchSelling;
use App\Entity\ImmobilierSearchRenting;
use App\Form\ImmobilierSearchSellingType;
use App\Form\ImmobilierSearchRentingType;
use App\Form\ContactType;
use App\Services\EmailNotification;


class ImmobilierController extends AbstractController
{
    private $em;
    private $findLogements;
    private $templateVariables;

    public function __construct(EntityManagerInterface $em, FindLogements $findLogements, TemplateVariables $templateVariables ){
        $this->em = $em;
        $this->findLogements = $findLogements;
        $this->templateVariables = $templateVariables;
    }

    /**
     * @Route("/immobiliers/{slug}-{id}", 
     *          name="immobilier.show",
     *          requirements={"slug": "[a-z0-9\-]*"}
     *
     * )
    */

    public function show(Immobilier $immobilier, string $slug, Request $request, EmailNotification $notification) {
      
        if ($immobilier->getSlug() !== $slug) {
            return $this->redirectToRoute('immobilier.show', [
                'id'   => $immobilier->getId(),
                'slug' => $immobilier->getSlug()
            ], 301);
        }

        $logements = null;
        if(method_exists($immobilier, "getAppartements")){
            $logements = $immobilier->getAppartements();
        }else if(method_exists($immobilier, "getMaisons")){
            $logements = $immobilier->getMaisons();
        }else{
            $logements = $immobilier->getCantines();
        }
        // deubut : gestion du formulaire de contact
        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            return $this->redirectToRoute('immobilier.show', [
                'id'   => $immobilier->getId(),
                'slug' => $immobilier->getSlug()
            ]);
        }

        // fin : gestion du formulaire de contact

        // dd($this->templateVariables);
        $variables = $this->templateVariables->getVariables($request);
        $variables['immobilier'] = $immobilier;
        $variables['formContact'] = $formContact->createView();
        $variables['logements'] = $logements;
       

        return $this->render('immobilier/show.html.twig', $variables);
    }

   /**
     * @Route("/immobiliers/{etat}", 
     *          name="immobilier.projets",
     *          requirements={"slug": "[a-z0-9\-]*"}
     *
     * )
    */

    public function findProjets(Request $request, $etat){
        
        $immobiliers = $this->em->getRepository(Immobilier::class)->findProjetTypeProjets($etat);
        $variables = $this->templateVariables->getVariables($request);
        $variables['immobiliers'] = $immobiliers;
        return $this->render('immobilier/projets.html.twig', $variables);
    }

    // private function getVariables(Request $request){

    //     $immobilierSearchSelling = new ImmobilierSearchSelling();
    //     $immobilierSearchRenting = new ImmobilierSearchRenting();
    //     $formSelling = $this->createForm(ImmobilierSearchSellingType::class, $immobilierSearchSelling);
    //     $formSelling->handleRequest($request);
    //     $formRenting = $this->createForm(ImmobilierSearchRentingType::class, $immobilierSearchRenting);
    //     $formRenting->handleRequest($request);
    //     $appartementsALouer = $this->findLogements->getAppartementsAVendre($immobilierSearchSelling);
    //     $appartementsAVendre = $this->findLogements->getAppartementsALouer($immobilierSearchRenting);
    //     $maisonsAVendre = $this->findLogements->getMaisonsAVendre($immobilierSearchSelling);
    //     $maisonsALouer = $this->findLogements->getMaisonsALouer($immobilierSearchRenting);
    //     $cantinesAVendre = $this->findLogements->getCantinesAVendre($immobilierSearchSelling);
    //     $cantinesALouer = $this->findLogements->getCantinesALouer($immobilierSearchRenting);
    //     return [

    //         'appartementsALouer' => $appartementsALouer,
    //         'appartementsAVendre' => $appartementsAVendre,
    //         'cantinesALouer' => $cantinesALouer,
    //         'cantinesAVendre' => $cantinesAVendre,
    //         'maisonsALouer' => $maisonsALouer,
    //         'maisonsAVendre' => $maisonsAVendre,
    //         'form_selling' => $formSelling->createView(),
    //         'form_renting' => $formRenting->createView(),
            
    //     ];
    // }
}
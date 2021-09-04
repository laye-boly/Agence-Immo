<?php
namespace App\Controller\admin\immeuble;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Immeuble;
use App\Form\ImmeubleType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ImmeubleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Knp\Component\Pager\PaginatorInterface;
// use Symfony\Component\Validator\Constraints\DateTime;

class AdminImmeubleController extends AbstractController
{
    private $em;
    private $repository;
    private $paginator;

    public function __construct(EntityManagerInterface $em, ImmeubleRepository $repository, PaginatorInterface $paginator ){
        $this->em = $em;
        $this->repository = $repository;
        $this->paginator = $paginator;
    }

    /**
     * @Route("admin/immeuble", name="admin.immeuble.index"
     * )
    */

    public function index(Request $request){
      
        $immeubles = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );
       
        return $this->render("admin/immeuble/index.html.twig", [
            'immeubles' => $immeubles
        ]);
    }

    /**
     * @Route("/admin/new/immeuble", name="admin.immeuble.create")
     */

    public function create(Request $request){
        $immeuble = new Immeuble;
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $immeuble = $form->getData();
            $avancements = $immeuble->getAvancements();
            // On lie chaque avancement à un immeuble avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($immeuble);
            }
            
            $appartements = $immeuble->getAppartements();
           // On lie chaque type d'appartement à un immeuble avant l'enregistrement en base de données.
            foreach($appartements as $appartement){
                $immeuble->addAppartement($appartement);
                $appartement->setUpdateAt(new \DateTime("now"));
            }
            //  dd($appartements);
            $immeuble->setNbreLocals(count($appartements));
            $this->em->persist($immeuble);
            $this->em->flush();
    
            return $this->redirectToRoute("admin.immeuble.index");
        }

        return $this->render('admin/immeuble/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("admin/edit/immeuble/{id}", name="admin.immeuble.edit")
     */

    public function edit(Immeuble $immeuble, Request $request){
       
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $immeuble = $form->getData();
            
            $avancements = $immeuble->getAvancements();
            // On lie chaque avancement à un immeuble avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($immeuble);
            }
            
            $appartements = $immeuble->getAppartements();
           // On lie chaque type d'appartement à un immeuble avant l'enregistrement en base de données.
            foreach($appartements as $appartement){
                $immeuble->addAppartement($appartement);
                $appartement->setUpdateAt(new \DateTime("now"));
            }
            
            $immeuble->setNbreLocals(count($appartements));
            
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
    
            return $this->redirectToRoute("admin.immeuble.index");
        }

        return $this->render('admin/immeuble/edit.html.twig', [
            "form" => $form->createView(),
            "immeuble" => $immeuble
        ]);
     }

     /**
     * @Route("admin/delete/immeuble/{id}", name="admin.immeuble.delete")
     */

    public function delete(Request $request, Immeuble $immeuble){

        if ($this->isCsrfTokenValid('delete' . $immeuble->getId(), $request->get('_token'))) {
            $this->em->remove($immeuble);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
        return $this->redirectToRoute('admin.immeuble.index');
    }
    /**
     * @Route("admin/immeuble/search", name="admin.immeuble.search")
     */

    public function search(Request $request){
        
        if ($this->isCsrfTokenValid('search', $request->get('_token')) && $request->get('search') !== ""){
            $immeubles = $this->paginator->paginate(
                $this->repository->findSearchedImmeuble($request->get('search')),
                $request->query->getInt('page', 1),
                5 //limit per page
            );
            
            return $this->render("admin/immeuble/index.html.twig", [
                'immeubles' => $immeubles
            ]);
           
        }

        $immeubles = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );

        return $this->render("admin/immeuble/index.html.twig", [
            'immeubles' => $immeubles
        ]);
    }

    /**
     * @Route("admin/show/immeuble/{id}", name="admin.immeuble.show")
     */

    public function show(){
        return new Response("ok");
    }

    
}
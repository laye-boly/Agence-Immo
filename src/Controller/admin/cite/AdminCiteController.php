<?php
namespace App\Controller\admin\cite;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cite;
use App\Form\CiteType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CiteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Knp\Component\Pager\PaginatorInterface;

class AdminCiteController extends AbstractController
{
    private $em;
    private $repository;
    private $paginator;

    public function __construct(EntityManagerInterface $em, CiteRepository $repository, PaginatorInterface $paginator ){
        $this->em = $em;
        $this->repository = $repository;
        $this->paginator = $paginator;
    }

    /**
     * @Route("editeur/cite", name="admin.cite.index"
     * )
    */

    public function index(Request $request){
      
        $cites = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );
       
        return $this->render("admin/cite/index.html.twig", [
            'cites' => $cites
        ]);
    }

    /**
     * @Route("/admin/new/cite", name="admin.cite.create")
     */

    public function create(Request $request){
        $cite = new Cite;
        $form = $this->createForm(CiteType::class, $cite);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $cite = $form->getData();
            $avancements = $cite->getAvancements();
            // On lie chaque avancement à la cité avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($cite);
            }
            
            $maisons = $cite->getMaisons();
           // On lie chaque type de maison la cité avant l'enregistrement en base de données.
            foreach($maisons as $maison){
                $cite->addMaison($maison);
            }
            
            $cite->setNbreLocals(count($maisons));
            $this->em->persist($cite);
            $this->em->flush();
    
            return $this->redirectToRoute('admin.cite.index');
            
        }

        return $this->render('admin/cite/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("admin/edit/cite/{id}", name="admin.cite.edit")
     */

    public function edit(Cite $cite, Request $request){
       
        $form = $this->createForm(CiteType::class, $cite);
        $form->handleRequest($request);
        $cite->setNbreLocals(count($cite->getMaisons()));
       
        if ($form->isSubmitted() && $form->isValid()) {
            $cite = $form->getData();
            $avancements = $cite->getAvancements();
            // On lie chaque avancement à la cité avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($cite);
            }
            
            $maisons = $cite->getMaisons();
           // On lie chaque type de maison à la cité avant l'enregistrement en base de données.
            foreach($maisons as $maison){
                $cite->addMaison($maison);
            }
            
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
    
            // return $this->redirectToRoute('task_success');
            return $this->redirectToRoute("admin.cite.index");
           
        }

        return $this->render('admin/cite/edit.html.twig', [
            "form" => $form->createView(),
            "cite" => $cite
        ]);
     }

     /**
     * @Route("admin/delete/cite/{id}", name="admin.cite.delete")
     */

    public function delete(Request $request, Cite $cite){

        if ($this->isCsrfTokenValid('delete' . $cite->getId(), $request->get('_token'))) {
            $this->em->remove($cite);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
        return $this->redirectToRoute('admin.cite.index');
    }
    /**
     * @Route("admin/cite/search", name="admin.cite.search")
     */

    public function search(Request $request){
        
        if ($this->isCsrfTokenValid('search', $request->get('_token')) && $request->get('search') !== ""){
            $cites = $this->paginator->paginate(
                $this->repository->findSearchedCite($request->get('search')),
                $request->query->getInt('page', 1),
                5 //limit per page
            );
            
            return $this->render("admin/cite/index.html.twig", [
                'cites' => $cites
            ]);
           
        }

        $cites = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );

        return $this->render("admin/immeuble/index.html.twig", [
            'cites' => $cites
        ]);
    }

    /**
     * @Route("admin/show/cite/{id}", name="admin.cite.show")
     */

    public function show(){
        return new Response("ok");
    }

    
}
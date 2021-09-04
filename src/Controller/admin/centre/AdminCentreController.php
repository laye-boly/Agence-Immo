<?php
namespace App\Controller\admin\centre;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CentreCommercial;
use App\Form\CentreCommercialType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CentreCommercialRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Knp\Component\Pager\PaginatorInterface;

class AdminCentreController extends AbstractController
{
    private $em;
    private $repository;
    private $paginator;

    public function __construct(EntityManagerInterface $em, CentreCommercialRepository $repository, PaginatorInterface $paginator ){
        $this->em = $em;
        $this->repository = $repository;
        $this->paginator = $paginator;
    }

    /**
     * @Route("admin/centre", name="admin.centre.index"
     * )
    */

    public function index(Request $request){
      
        $centres = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );
       
        return $this->render("admin/centre/index.html.twig", [
            'centres' => $centres
        ]);
    }

    /**
     * @Route("/admin/new/centre", name="admin.centre.create")
     */

    public function create(Request $request){
        $centre = new CentreCommercial;
        $form = $this->createForm(CentreCommercialType::class, $centre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $centre = $form->getData();
            $avancements = $centre->getAvancements();
            // On lie chaque avancement au centre commercial avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($centre);
            }
            
            $cantines = $centre->getCantines();
           // On lie chaque type de cantine au centre commercial avant l'enregistrement en base de données.
            foreach($cantines as $cantine){
                $centre->addCantine($cantine);
            }
            //  dd($cantines);
            $centre->setNbreLocals(count($cantines));
            $this->em->persist($centre);
            $this->em->flush();
    
            return $this->redirectToRoute("admin.centre.index");
        }

        return $this->render('admin/centre/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("admin/edit/centre/{id}", name="admin.centre.edit")
     */

    public function edit(CentreCommercial $centre, Request $request){
       
        $form = $this->createForm(CentreCommercialType::class, $centre);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $centre = $form->getData();
            $avancements = $centre->getAvancements();
            // On lie chaque avancement au centre commercial avant l'enregistrement en base de données.
            foreach($avancements as $avancement){
                $avancement->setImmobilier($centre);
            }
            $cantines = $centre->getCantines();
            // On lie chaque type d'appartement au centre commercial avant l'enregistrement en base de données.
            foreach($cantines as $cantine){
                $centre->addCantine($cantine);
            }
            //  dd($cantines);
            
            $centre->setNbreLocals(count($cantines));
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
    
            // return $this->redirectToRoute('task_success');
            return $this->redirectToRoute("admin.centre.index");
        }

        return $this->render('admin/centre/edit.html.twig', [
            "form" => $form->createView(),
            "centre" => $centre
        ]);
     }

     /**
     * @Route("admin/delete/centre/{id}", name="admin.centre.delete")
     */

    public function delete(Request $request, CentreCommercial $centre){

        if ($this->isCsrfTokenValid('delete' . $centre->getId(), $request->get('_token'))) {
            $this->em->remove($centre);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
        return $this->redirectToRoute('admin.centre.index');
    }
    /**
     * @Route("admin/centre/search", name="admin.centre.search")
     */

    public function search(Request $request){
        
        if ($this->isCsrfTokenValid('search', $request->get('_token')) && $request->get('search') !== ""){
            $centres = $this->paginator->paginate(
                $this->repository->findSearchedCentre($request->get('search')),
                $request->query->getInt('page', 1),
                5 //limit per page
            );
            
            return $this->render("admin/centre/index.html.twig", [
                'centres' => $centres
            ]);
           
        }

        $centres = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );

        return $this->render("admin/centre/index.html.twig", [
            'centres' => $centres
        ]);
    }

    /**
     * @Route("admin/show/centre/{id}", name="admin.centre.show")
     */

    public function show(){
        return new Response("ok");
    }

    
}
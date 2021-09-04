<?php
namespace App\Controller\admin\fonctionnalite;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Fonctionnalite;
use App\Form\FonctionnaliteType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FonctionnaliteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Knp\Component\Pager\PaginatorInterface;

class AdminFonctionnaliteController extends AbstractController
{
    private $em;
    private $repository;
    private $paginator;

    public function __construct(EntityManagerInterface $em, FonctionnaliteRepository $repository, PaginatorInterface $paginator ){
        $this->em = $em;
        $this->repository = $repository;
        $this->paginator = $paginator;
    }

    /**
     * @Route("admin/fonctionnalite", name="admin.fonctionnalite.index"
     * )
    */

    public function index(Request $request){
      
        $fonctionnalites = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );
       
        return $this->render("admin/fonctionnalite/index.html.twig", [
            'fonctionnalites' => $fonctionnalites
        ]);
    }

    /**
     * @Route("/admin/new/fonctionnalite", name="admin.fonctionnalite.create")
     */

    public function create(Request $request){

        if($request->isMethod('post') && $this->isCsrfTokenValid('fonctionnalite', $request->get('_token'))){

            $nbreAjout = intval($request->request->get("nbreAjout"));
            $fonctionnalites = $this->repository->findAll();   	
            $arrayAnciennesFonctionnalites  = array();
            foreach ($fonctionnalites as $fonctionnalite) {
            
                $arrayAnciennesFonctionnalites[] = strtolower($fonctionnalite->getFonctionnalite());
            }

               	$arrayNouvellesFonctionnalites = array();

                for($i = 0; $i < $nbreAjout; $i++){

                    $arrayNouvellesFonctionnalites[] = $request->request->get('fon'.$i);
                }

                $arrayNouvellesFonctionnalites = array_unique($arrayNouvellesFonctionnalites);

               	for($i = 0; $i < count($arrayNouvellesFonctionnalites); $i++){
               			if(!preg_match("#^ +$#", $arrayNouvellesFonctionnalites[$i]) && !in_array(strtolower($arrayNouvellesFonctionnalites[$i]), $arrayAnciennesFonctionnalites)){

               				$fonctionnalite = new Fonctionnalite();
               				$fonctionnalite->setFonctionnalite($request->request->get('fon'.$i));

               				$this->em->persist($fonctionnalite);
               			}
               	}

               	$this->em->flush();

               	$fonctionnalites  = $this->repository->findAll();

			


        }

        return $this->render('admin/fonctionnalite/create.html.twig');
    }

    /**
     * @Route("admin/edit/fonctionnalite/{id}", name="admin.fonctionnalite.edit")
     */

    public function edit(Request $request, Fonctionnalite $fonctionnalite){

        $form = $this->createForm(FonctionnaliteType::class, $fonctionnalite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $fonctionnalite = $form->getData();
            $fonctionnalites = $this->repository->findAll();   	
            $arrayAnciennesFonctionnalites  = array();
            foreach ($fonctionnalites as $fonctionnalite) {
            
                $arrayAnciennesFonctionnalites[] = strtolower($fonctionnalite->getFonctionnalite());
            }
            $editFonctionnalite = $fonctionnalite->getFonctionnalite();
                  	
            if(!preg_match("#^ +$#", $editFonctionnalite && !in_array(strtolower($editFonctionnalite), $arrayAnciennesFonctionnalites))){

               	$this->em->persist($fonctionnalite);
            }
            $this->em->flush();
            $this->addFlash('success', 'Fonctionnalité modifiée avec succès');
    
            
            return $this->redirectToRoute("admin.fonctionnalite.index");
			


        }

        return $this->render('admin/fonctionnalite/edit.html.twig', ["form" => $form->createView()]);
    }

     /**
     * @Route("admin/delete/fonctionnalite/{id}", name="admin.fonctionnalite.delete")
     */

    public function delete(Request $request, Fonctionnalite $fonctionnalite){

        if ($this->isCsrfTokenValid('delete' . $fonctionnalite->getId(), $request->get('_token'))) {
            // dd($fonctionnalite->getImmobiliers());
            foreach($fonctionnalite->getImmobiliers() as $immobilier) {
                $fonctionnalite->removeImmobilier($immobilier);
            }
            $this->em->remove($fonctionnalite);
            $this->em->flush();
            $this->addFlash('success', 'Fonctionnalité supprimé avec succès');
        }
        return $this->redirectToRoute('admin.fonctionnalite.index');
    }
    /**
     * @Route("admin/fonctionnalite/search", name="admin.fonctionnalite.search")
     */

    public function search(Request $request){
        
        if ($this->isCsrfTokenValid('search', $request->get('_token')) && $request->get('search') !== ""){
            $fonctionnalites = $this->paginator->paginate(
                $this->repository->findSearchedFonctionnalite($request->get('search')),
                $request->query->getInt('page', 1),
                5 //limit per page
            );
            
            return $this->render("admin/fonctionnalite/index.html.twig", [
                'fonctionnalites' => $fonctionnalites
            ]);
           
        }

        $fonctionnalites = $this->paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            5 //limite par page
        );

        return $this->render("admin/fonctionnalite/index.html.twig", [
            'fonctionalites' => $fonctionnalites
        ]);
    }

    // /**
    //  * @Route("admin/show/fonctionnalite/{id}", name="admin.fonctionnalite.show")
    //  */

    // public function show(){
    //     return new Response("ok");
    // }

    
}
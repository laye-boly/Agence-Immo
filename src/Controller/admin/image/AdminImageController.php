<?php
namespace App\Controller\admin\image;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Knp\Component\Pager\PaginatorInterface;
// use Symfony\Component\Validator\Constraints\DateTime;

class AdminImageController extends AbstractController
{
    private $em;
  

    public function __construct(EntityManagerInterface $em ){
        $this->em = $em;
        
       
    }

    
     /**
     * @Route("admin/delete/image/{id}", name="admin.image.delete")
     */


    public function delete(Image $image, Request $request) {
        $data = json_decode($request->getContent(), true);
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
            return new JsonResponse(['success' => 1]);
        }

        return new JsonResponse(['error' => 'Token invalide'], 400);
    }
  
    
}
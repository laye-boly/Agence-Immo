<?php
namespace App\Controller\admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin.index")
     */
    public function index()
    {

        return $this->render('admin/index.html.twig');
    }
}
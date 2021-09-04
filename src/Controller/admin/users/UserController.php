<?php
namespace App\Controller\admin\users;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;

class UserController extends AbstractController
{
    private $em;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder){
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/admin/users", name="admin.user.index"
     * )
    */
    public function index(Request $request)
    {
        $users = $this->em->getRepository(User::class)->findAll();
        return $this->render("admin/users/index.html.twig", ["users" => $users]);
    }

    /**
     * @Route("/admin/create", name="admin.user.create"
     * )
    */
    public function create(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($user->getPassword() !== $user->getConfirmPassword()){
                $this->addFlash('erreur', 'Les mots de passe sont différents !');
                return $this->redirectToRoute("admin.user.create");
            }
            $user->setPassword($this->passwordEncoder->encodePassword( $user, $user->getPassword()));
            $user->setRoles(["ROLE_ADMIN"]);
            $this->em->persist($user);
            $this->em->flush();
            $userCreated = $this->em->getRepository(User::class)->findLastUser();
            return $this->redirectToRoute("admin.user.index");
        }

        return $this->render("admin/users/create.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/user/edit/{id}-{slug}", name="admin.user.edit"
     * )
    */
    public function edit(Request $request, User $user, $slug)
    {
        if ($user->getSlug() !== $slug) {
            return $this->redirectToRoute('admin.user.edit', [
                'id'   => $user->getId(),
                'slug' => $user->getSlug()
            ], 301);
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if($user->getPassword() !== $user->getConfirmPassword()){
                $this->addFlash('erreur', 'Les mots de passe sont différents !');
                return $this->redirectToRoute('admin.user.edit', [
                    'id'   => $user->getId(),
                    'slug' => $user->getSlug()
                ], 301);
            }
            $user->setPassword($this->passwordEncoder->encodePassword( $user, $user->getPassword()));
            $this->em->persist($user);
            $this->em->flush();
            $userCreated = $this->em->getRepository(User::class)->findLastUser()[0];
            // dd($userCreated);
            return $this->redirectToRoute("admin.user.index");
        }

        return $this->render("admin/users/edit.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/user/{id}", name="admin.user.delete"
     * )
    */
    
    public function delete(Request $request, User $user){

        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token'))) {
            $this->em->remove($user);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
        return $this->redirectToRoute('admin.user.index');
    }

    

   
}
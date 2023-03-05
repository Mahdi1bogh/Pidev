<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exploit;
use App\Entity\User;
use App\Form\SignupformType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function index1(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/club', name: 'app_club')]
    public function index2(): Response
    {
        return $this->render('home/club.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/magasin', name: 'app_magasin')]
    public function index3(): Response
    {
        return $this->render('home/magasin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/reclamation', name: 'app_reclamation')]
    public function index4(): Response
    {
        return $this->render('home/reclamation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/tournois', name: 'app_tournois')]
    public function index5(): Response
    {
        return $this->render('home/tournois.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/signup', name: 'app_signup')]
    public function index6(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {

        $user = new User();

        $form = $this->createForm(SignupformType::class,$user);

        $form->handleRequest($request);



        if($form->isSubmitted() && $form->isValid())
        {
            // encode the plain password
            $userData = $form->getData();
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $userData->getPassword()
                )
               
            );
            /** @var UploadedFile $uploadedFile */
            $uploadedFile=$form['image']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFile = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFile
               );

               $user->setImage($newFile);

               $user->setRoles(['ROLE_USER']);

               $entityManager->persist($user);
               $entityManager->flush();

        }


        
        return $this->render('home/register.html.twig', [
            'controller_name' => 'HomeController',
            'formUser' => $form->createView(),
            "user" => $user ,
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function index7(): Response
    {
        return $this->render('home/register.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function index8(): Response
    {
        return $this->render('home/panier.html.twig', [
            'controller_name' => 'HomeController',
            
        ]);
    }
    
    
    #[Route('/login', name: 'app_login')]
    public function index9(authenticationUtils $authenticationUtils,Request $request ,EntityManagerInterface $entityManager): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $email = $authenticationUtils->getLastUsername();
       
       
        
        return $this->render('security/login.html.twig', [
            'email' => $email , 
            'error' => $error ,
            
        ]);
    }
}

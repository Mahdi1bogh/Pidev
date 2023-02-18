<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/login', name: 'app_login')]
    public function index6(): Response
    {
        return $this->render('home/login.html.twig', [
            'controller_name' => 'HomeController',
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
}
<?php

namespace App\Controller;

use App\Entity\Tournois;
use App\Repository\TournoisRepository;
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

  

    #[Route('/tournoisfront', name: 'app_tournois', methods: ['GET'])]
    public function index5(TournoisRepository $tournoisRepository): Response
    {
        return $this->render('home/tournois.html.twig', [
            'tournois' => $tournoisRepository->findAll(),
        ]);
    }


    #[Route('/tournoisdetails/{id}', name: 'app_details', methods: ['GET'])]
    public function show(Tournois $tournoi): Response
    {
        return $this->render('home/tournoisdetails.html.twig', [
            'tournoi' => $tournoi,
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

    #[Route('/calender', name: 'app_calender')]
    public function calender(TournoisRepository $calendar)
    {
        $events = $calendar->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getDateTour()->format('Y-m-d H:i:s'),
                'end' => $event->getDateFin()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                
            ];
        }

        $data = json_encode($rdvs);

        return $this->render('home/calendar.html.twig', compact('data'));
    }


 
}

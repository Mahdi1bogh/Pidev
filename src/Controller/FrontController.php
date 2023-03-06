<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;          

class FrontController extends AbstractController
{
    #[Route('/front', name: 'app_front')]
    public function index(ClubRepository $clubRepository): Response
    {
        return $this->render('front/index.html.twig', [
            'clubs' => $clubRepository->findAll(),
            'controller_name' => 'FrontController',
        ]);
    }
}

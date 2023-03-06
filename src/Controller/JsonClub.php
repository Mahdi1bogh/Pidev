<?php

namespace App\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class JsonClub extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route("/AllClubs", name: "list")]
    //* Dans cette fonction, nous utilisons les services SerializerInterface et ClubRepository, 
    //* avec la méthode d'injection de dépendances.
    public function getClubs(ClubRepository $repo, SerializerInterface $serializer)
    {
        $clubs = $repo->findAll();
        //* Nous utilisons la fonction serialize qui transforme les objets clubs en format JSON
        $json = $serializer->serialize($clubs, 'json', ['groups' => "clubs"]);

        //* Nous renvoyons une réponse Http qui prend en paramètre une chaine de caractères en format JSON
        return new Response($json);
    }

    #[Route("/Clubjs/{id}", name: "Club")]
    public function getClubById($id, NormalizerInterface $normalizer, ClubRepository $repo)
    {
        $club = $repo->find($id);
        $clubNormalised = $normalizer->normalize($club, 'json', ['groups' => "clubs"]);
        return new Response(json_encode($clubNormalised));
    }

    #[Route("addClubJSON/new", name: "addClubJSON")]
    public function addClubJSON(Request $req, NormalizerInterface $normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $club = new Club();
        $club->setName($req->get('name'));
        $club->setLocation($req->get('location'));
        $em->persist($club);
        $em->flush();

        $jsonContent = $normalizer->normalize($club, 'json', ['groups' => 'clubs']);
        return new Response(json_encode($jsonContent));
    }

    #[Route("updateClubJSON/{id}", name: "updateClubJSON")]
    public function updateClubJSON(Request $req, $id, NormalizerInterface $normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(Club::class)->find($id);
        $club->setName($req->get('name'));
        $club->setLocation($req->get('location'));

        $em->flush();

        $jsonContent = $normalizer->normalize($club, 'json', ['groups' => 'clubs']);
        return new Response("Club updated successfully " . json_encode($jsonContent));
    }

    #[Route("deleteClubJSON/{id}", name: "deleteClubJSON")]
    public function deleteClubJSON(Request $req, $id, NormalizerInterface $normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(Club::class)->find($id);
        $em->remove($club);
        $em->flush();
        $jsonContent = $normalizer->normalize($club, 'json', ['groups' => 'clubs']);
        return new Response("Club deleted successfully " . json_encode($jsonContent));
    }
}
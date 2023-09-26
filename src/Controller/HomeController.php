<?php

namespace App\Controller;

use App\Repository\PartyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app')]
    #[Route('/accueil', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

    #[Route('/events', name: 'app_events')]
    public function events(PartyRepository $partyRepository): Response
    {
        return $this->render('home/events.html.twig', [
            'parties' => $partyRepository->FindAllDisplayedParty(),
        ]);
    }
}

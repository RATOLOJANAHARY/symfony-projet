<?php

namespace App\Controller;

use App\Repository\PersonnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    /**
     * @Route("/statistique", name="statistique")
     */
    public function index(PersonnelRepository $PersonnelRepository)
    {
        return $this->render('statistique/index.html.twig', [
            'controller_name' => 'StatistiqueController',
            'personnels' => $PersonnelRepository->findAll(),
        ]);
    }
}

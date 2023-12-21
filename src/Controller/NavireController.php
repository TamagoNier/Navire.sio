<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\NavireRepository;
use App\Entity\Navire;

#[Route('navire', name: 'navire')]
class NavireController extends AbstractController
{
    #[Route('/voirtous', name:'voirtous')]
    public function voirTous(NavireRepository $repoNavire):Response {
        $navires = $repoNavire->findAll();
        return $this->render('navire/voirtous.html.twig', [
           'navires' =>$navires, 
        ]);
    }
}

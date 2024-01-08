<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortController extends AbstractController
{
    #[Route('/port', name: 'app_port')]
    public function index(): Response
    {
        return $this->render('port/index.html.twig', [
            'controller_name' => 'PortController',
        ]);
    }
}

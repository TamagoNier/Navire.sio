<?php

namespace App\Controller;

use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PortRepository;
use App\Form\PortType;
use App\Entity\Port;

#[Route('port', name: 'port_')]
class PortController extends AbstractController
{
    #[Route('/creer', name:'creer')]
    #[IsGranted('ROLE_ADMIN')]
    public function creer(Request $request, EntityManagerInterface $em): Response{
        $port = new Port();
        $form = $this->createForm(PortType::class, $port);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($port);
            $em->flush();
            return $this->redirectToRoute('home_homepage');
        }
        return $this->render('port/edit.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NavireRepository;
use App\Form\NavireType;
use App\Entity\Navire;

#[Route('navire', name: 'navire_')]
class NavireController extends AbstractController
{
    #[Route('/voirtous', name:'voirtous')]
    public function voirTous(NavireRepository $repoNavire):Response {
        $navires = $repoNavire->findAll();
        return $this->render('navire/voirtous.html.twig', [
           'navires' =>$navires, 
        ]);
    }
    
    #[Route('/editer/{id}', name:'editer')]
    #[IsGranted('ROLE_ADMIN')]
    public function editer(int $id, Request $request, NavireRepository $repo, EntityManagerInterface $em): Response{
        $navire = $repo->find($id);
        
        $form = $this->createForm(NavireType::class, $navire);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $navire = $form->getData();
            $em->persist($navire);
            $em->flush();
            return $this->redirectToRoute('home_homepage');
        }
        
        return $this->render('navire/edit.html.twig', [
            'form'=>$form->createView(),
            'navire'=>$navire,
        ]);
    }
}

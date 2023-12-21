<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\AisShipType;
use App\Repository\AisShipTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('aisshiptype', name: 'aisshiptype_')]
class AisShipTypeController extends AbstractController
{
    #[Route('/voirtous', name:'voirtous')]
    public function voirTous(AisShipTypeRepository $repoAisShipType):Response {
        $aisShipType = $repoAisShipType->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
           'aisShipTypes' =>$aisShipType, 
        ]);
    }
    
    #[Route('/portscompatibles', name:'portscompatibles')]
    public function portsCompatibles(Request $request, AisShipTypeRepository $repo) : Response{
        $aisShipType = $repo->find($request->get('id'));
        return $this->render('aisshiptype/portscompatibles.html.twig', [
            'aisShipType'=>$aisShipType,
        ]);
    }
    
}

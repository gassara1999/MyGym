<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MygymController extends AbstractController
{
    #[Route('/index', name: 'app_mygym')]
    public function index(): Response
    {
        return $this->render('mygym/index.html.twig', [
            'controller_name' => 'MygymController',
        ]);
    }
   
}

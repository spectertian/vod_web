<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TipController extends AbstractController
{
    #[Route('/tip', name: 'tip')]
    public function index(): Response
    {
        return $this->render('tip/index.html.twig', [
            'controller_name' => 'TipController',
        ]);
    }
}

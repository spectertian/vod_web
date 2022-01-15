<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetrieveController extends AbstractController
{
    #[Route('/retrieve', name: 'retrieve')]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        return $this->render('retrieve/index.html.twig', [
            'title' => '索引',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;




class ListController extends AbstractController
{
    #[Route('/list', name: 'list')]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        dump($listsRepository);
        $list = $listsRepository->findAll();
        dump($list);
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}

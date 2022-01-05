<?php

namespace App\Controller;

use App\DocumentRepository\DownInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;


class ListController extends AbstractController
{
    #[Route('/list_dy', name: 'dy')]
    public function index(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findAll();;
        dump($listRes);
        return $this->render('list_dy/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }

    #[Route('/list_dsj', name: 'dsj')]
    public function dsj(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findAll();;
        dump($listRes);
        return $this->render('list_dy/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}
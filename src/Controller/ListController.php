<?php

namespace App\Controller;

use App\DocumentRepository\DownInfoRepository;
use Doctrine\ORM\Tools\Pagination\paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;


class ListController extends AbstractController
{
    #[Route('/list_dy', name: 'dy')]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        $listRes = $listsRepository->findAll();

        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
        ]);
    }

    #[Route('/list_dsj', name: 'dsj')]
    public function dsj(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findAll();;
        return $this->render('list_dy/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }


}

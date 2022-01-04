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
    #[Route('/list', name: 'list')]
    public function index(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
//        dump($listsRepository);
//        $list = $listsRepository->findAll();
        $list2 = $downInfoRepository->getClassMetadata();
//        dump($list);
//        print_r($list2);
        dump($list2);
//        dump($downInfoRepository);
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}

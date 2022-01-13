<?php

namespace App\Controller;

use App\DocumentRepository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'news')]
    public function index(NewsRepository $newsRepository, Request $request): Response
    {
        $listRes = $newsRepository->findAll();

        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController',
            'title'           => '最新电影',
            'res'             => $listRes,
        ]);
    }
}

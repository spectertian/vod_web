<?php

namespace App\Controller;

use App\DocumentRepository\UpdateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateController extends AbstractController
{
    #[Route('/update.html', name: 'update', options: ['sitemap' => true])]
    public function index(UpdateRepository $updateRepository): Response
    {
        $dy  = $updateRepository->findBy(['type' => '电影'], ['date' => 'desc'], 40);
        $dsj = $updateRepository->findBy(['type' => '电视剧'], ['date' => 'desc'], 40);
        return $this->render('update/index.html.twig', [
            'controller_name' => 'UpdateController',
            'title'           => '今日更新影片',
            'dy'              => $dy,
            'dsj'             => $dsj,
        ]);
    }
}

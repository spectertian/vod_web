<?php

namespace App\Controller;

use App\DocumentRepository\NewsRepository;
use App\Service\MessageGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'news')]
    public function index(NewsRepository $newsRepository, Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator): Response
    {
        $listRes = $newsRepository->findAll();
        $query      = $newsRepository->createQueryBuilder("n");
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('news/index.html.twig', [
            'title'      => '最新电影',
            'res'        => $listRes,
            'pagination' => $pagination
        ]);
    }
}

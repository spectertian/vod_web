<?php

namespace App\Controller;

use App\DocumentRepository\NewsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'news')]
    public function index(NewsRepository $newsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query      = $newsRepository->createQueryBuilder();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('news/index.html.twig', [
            'title'      => '最新电影',
            'pagination' => $pagination
        ]);
    }
}

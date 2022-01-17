<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RetrieveController extends AbstractController
{
    #[Route('/retrieve', name: 'retrieve')]
    public function index(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query      = $listsRepository->createQueryBuilder();
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

//        dump($pagination);
        return $this->render('retrieve/index.html.twig', [
            'title'      => '索引',
            'pagination' => $pagination,
        ]);
    }

    #[Route('/retrieve_category', name: 'retrieve_category')]
    public function category(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query      = $listsRepository->createQueryBuilder();
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('news/index.html.twig', [
            'title'      => '最新电影',
            'pagination' => $pagination
        ]);
    }


}

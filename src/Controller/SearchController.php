<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        $keyword        = $request->get("keyword");
        $submittedToken = $request->request->get('_token');
        $res            = $listsRepository->findBy(["title"]);
        if ($this->isCsrfTokenValid('search-item', $submittedToken)) {


        } else {
//            return $this->redirectToRoute('search', ["keyword" => $keyword]);
        }


        return $this->render('search/index.html.twig', [
            'res'   => $res,
            'title' => '搜索结果',
        ]);
    }
}

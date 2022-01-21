<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}.html', name: 'detail', methods: ['GET'])]
    public function index(ListsRepository $listsRepository, Request $request, RecommendList $recommendList): Response
    {
        $id  = $request->get('id');
        $res = $listsRepository->find($id);
        return $this->render('detail/index.html.twig', [
            'res'   => $res,
            'today' => $recommendList->getToday(),
            'topic' => $recommendList->getTopic(),
            'like'  => $recommendList->getList(),
        ]);
    }
}

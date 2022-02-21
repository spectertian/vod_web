<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use App\Service\VodService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}.html', name: 'detail', methods: ['GET'])]
    public function index(VodListRepository $vodListRepository, Request $request, RecommendList $recommendList): Response
    {
        $id   = $request->get('id');
        $info = $vodListRepository->find($id);
        return $this->render('detail/index.html.twig', [
            'info'           => $info,
            'topic'          => $recommendList->getHotByTypeName($info->getType()),
            'recommend_list' => $recommendList->getHotByTypeId($info->getTypeId()),
        ]);
    }
}

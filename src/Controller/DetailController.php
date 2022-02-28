<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Mobile_Detect;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}.html', name: 'detail', methods: ['GET'])]
    public function index(VodListRepository $vodListRepository, Request $request, RecommendList $recommendList, Mobile_Detect $mobile_Detect): Response
    {
        $id   = $request->get('id');
        $info = $vodListRepository->find($id);

        if ($mobile_Detect->isMobile()) {
            $tmp = 'm/detail/index.html.twig';
        } else {
            $tmp = 'detail/index.html.twig';
        }

        return $this->render($tmp, [
            'info'           => $info,
            'topic'          => $recommendList->getHotByTypeName($info->getType()),
            'recommend_list' => $recommendList->getHotByTypeId($info->getTypeId()),
        ]);
    }
}

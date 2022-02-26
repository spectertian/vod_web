<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RankController extends AbstractController
{
    public function index(VodListRepository $vodListRepository, RecommendList $recommendList, Request $request): Response
    {

        return $this->render('rank/index.html.twig', [

        ]);
    }
}

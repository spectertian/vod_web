<?php

namespace App\Controller;

use App\DocumentRepository\DownInfoRepository;
use Doctrine\ORM\Tools\Pagination\paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;


class ListController extends AbstractController
{

    #[Route('/list_zx', name: 'zx')]
    public function zx(ListsRepository $listsRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '动作片']);

        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "最新电影",
        ]);
    }

    #[Route('/list_zt', name: 'zt')]
    public function zt(ListsRepository $listsRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '动作片']);

        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "专题",
        ]);
    }

    #[Route('/list_sy', name: 'sy')]
    public function sy(ListsRepository $listsRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '动作片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "索引",

        ]);
    }

    #[Route('/list_dz', name: 'dz')]
    public function dz(ListsRepository $listsRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '动作片']);

        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "动作片",
        ]);
    }

    #[Route('/list_kh', name: 'kh')]
    public function kh(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '科幻片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "科幻片",
        ]);
    }

    #[Route('/list_aq', name: 'aq')]
    public function aq(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '爱情片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "爱情片",
        ]);
    }


    #[Route('/list_xj', name: 'xj')]
    public function xj(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '喜剧片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "喜剧片",
        ]);
    }


    #[Route('/list_kb', name: 'kb')]
    public function kb(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '恐怖片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "恐怖片",
        ]);
    }

    #[Route('/list_zz', name: 'zz')]
    public function zz(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '战争片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "战争片",
        ]);
    }

    #[Route('/list_jq', name: 'jq')]
    public function jq(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '剧情片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "剧情片",
        ]);
    }

    #[Route('/list_kb', name: 'jl')]
    public function jl(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '纪录片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "纪录片",
        ]);
    }

    #[Route('/list_dh', name: 'dh')]
    public function dh(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '动画片']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "动画片",
        ]);
    }

    #[Route('/list_dsj', name: 'dsj')]
    public function dsj(ListsRepository $listsRepository, DownInfoRepository $downInfoRepository, Request $request): Response
    {
        $listRes = $listsRepository->findBy(['type' => '电视剧']);
        return $this->render('list_dy/index.html.twig', [
            'listRes' => $listRes,
            'title'   => "电视剧",
        ]);
    }


}

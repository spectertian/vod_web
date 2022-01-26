<?php

namespace App\Controller;

use App\DocumentRepository\DownInfoRepository;
use App\Service\RecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;


class ListController extends AbstractController
{
    #[Route('/list_dz.html', name: 'dz', options: ['sitemap' => true])]
    public function dz(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '动作片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 12);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'nav'        => $this->generateUrl('dz'),
            'recommend'  => $recommendList->getList(),
        ]);
    }

    #[Route('/list_kh.html', name: 'kh')]
    public function kh(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {

        $type  = '科幻片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 10);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('kh'),
        ]);
    }

    #[Route('/list_aq.html', name: 'aq')]
    public function aq(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '爱情片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 12);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('aq'),
        ]);
    }


    #[Route('/list_xj.html', name: 'xj')]
    public function xj(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '喜剧片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['updated_time' => 'desc']);
        $query->sort(['year' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('dz'),
        ]);
    }


    #[Route('/list_kb', name: 'kb')]
    public function kb(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '恐怖片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('kb'),
        ]);
    }

    #[Route('/list_zz.html', name: 'zz')]
    public function zz(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '战争片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('zz'),
        ]);
    }

    #[Route('/list_jq.html', name: 'jq')]
    public function jq(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '剧情片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

//        dump($pagination);
        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('jq'),
        ]);
    }

    #[Route('/list_kb.html', name: 'jl')]
    public function jl(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '纪录片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('jl'),
        ]);
    }

    #[Route('/list_dh.html', name: 'dh')]
    public function dh(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {

        $type  = '动画片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('dh'),
        ]);
    }

    #[Route('/list_dsj.html', name: 'dsj')]
    public function dsj(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '电视剧';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('list/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('dsj'),
        ]);
    }


}

<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use App\Service\TypeRecommendList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DocumentRepository\ListsRepository;
use Symfony\Component\HttpFoundation\Request;


class TController extends AbstractController
{
    #[Route('/t_dy.html', name: 'dy', options: ['sitemap' => true])]
    public function dy(VodListRepository $vodListRepository, Request $request, TypeRecommendList $recommendList): Response
    {
        $type = '1';
        $vodListRepository->findBy(['type_id_1' => 1], ["vod_time" => 'desc', 'vod_douban_score' => 'desc'], 8);
        return $this->render('t/index.html.twig', [
            'title' => $recommendList->getReByDy(),
            'nav'   => $this->generateUrl('dz'),
        ]);
    }

    #[Route('/list_tv.html', name: 'tv')]
    public function tv(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {

        $type  = '科幻片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 10);

        return $this->render('t/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('kh'),
        ]);
    }

    #[Route('/list_dm.html', name: 'dm')]
    public function dm(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '爱情片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['year' => 'desc']);
        $query->sort(['updated_time' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 12);

        return $this->render('t/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('aq'),
        ]);
    }


    #[Route('/list_zy.html', name: 'zy')]
    public function zy(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList): Response
    {
        $type  = '喜剧片';
        $query = $listsRepository->createQueryBuilder()->field('type')->equals($type);
        $query->sort(['updated_time' => 'desc']);
        $query->sort(['year' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        return $this->render('t/index.html.twig', [
            'pagination' => $pagination,
            'title'      => $type,
            'recommend'  => $recommendList->getList(),
            'nav'        => $this->generateUrl('dz'),
        ]);
    }
}

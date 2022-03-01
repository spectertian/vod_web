<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use App\Service\RecommendList;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Mobile_Detect;

class SearchController extends AbstractController
{
    #[Route('/search.html', name: 'search', options: ['sitemap' => true])]
    public function index(VodListRepository $vodListRepository, Request $request, PaginatorInterface $paginator, RecommendList $recommendList, Mobile_Detect $mobile_Detect): Response
    {
        $topicList = $recommendList->getTopic(8);
        $keyword   = $request->get("wd");
        $query     = $vodListRepository->createQueryBuilder();

        if ($keyword != '') {
            $query->addOr($query->expr()->field('director')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('stars')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('tags')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('title')->equals(new \MongoDB\BSON\Regex($keyword, "i")));
        }
        $query->sort('vod_time', 'DESC');

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), 10);

        $pagination->setParam('wd', $keyword);


        if ($mobile_Detect->isMobile()) {
            $tmp   = 'm/search/index.html.twig';
            $tmpPg = 'm/show/pagination.html.twig';
        } else {
            $tmp   = 'search/index.html.twig';
            $tmpPg = 'show/pagination.html.twig';
        }

        $pagination->setTemplate($tmpPg);

        return $this->render($tmp, [
            'pagination' => $pagination,
            'title'      => '搜索结果',
            'wd'         => $keyword,
            'topicList'  => $topicList,
        ]);
    }

    #[Route('/search_m.html', name: 'search_m')]
    public function m(VodListRepository $vodListRepository, RecommendList $recommendList): Response
    {
        return $this->render('m/search/m.html.twig', [
            'dy'    => $recommendList->getHotMovie(6),
            'dsj'   => $recommendList->getHotDsj(6),
            'zy'    => $recommendList->getHotZy(6),
            'dm'    => $recommendList->getHotDm(6),
            'topic' => $recommendList->getTopic(6),
        ]);
    }
}

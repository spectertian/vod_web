<?php

namespace App\Controller;

use App\DocumentRepository\VodListRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VodSearchController extends AbstractController
{
    #[Route('/vod/search.html', name: 'vod_search', options: ['sitemap' => true])]
    public function index(VodListRepository $vodListRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $keyword = $request->get("keyword", "");

        $query = $vodListRepository->createQueryBuilder();
        if ($keyword != '') {
            $query->addOr($query->expr()->field('director')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('stars')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('tags')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('class')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('title')->equals(new \MongoDB\BSON\Regex($keyword, "i")));
        }

        $query->sort('vod_time', 'DESC');

        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 10);

        $pagination->setParam('keyword', $keyword);
        return $this->render('vod_search/index.html.twig', [
            'pagination' => $pagination,
            'title'      => '搜索结果',
            'keyword'    => $keyword,
        ]);
    }
}

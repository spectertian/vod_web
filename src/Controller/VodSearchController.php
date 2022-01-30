<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VodSearchController extends AbstractController
{
    #[Route('/vod/search', name: 'vod_search', options: ['sitemap' => true])]
    public function index(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $keyword = $request->get("keyword");
        $query   = $listsRepository->createQueryBuilder();
        if ($keyword != '') {
            $query->addOr($query->expr()->field('director')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('stars')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('tags')->in([new \MongoDB\BSON\Regex($keyword, "i")]));
            $query->addOr($query->expr()->field('title')->equals(new \MongoDB\BSON\Regex($keyword, "i")));
        }
        $query->sort('year', 'DESC');

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

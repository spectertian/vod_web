<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $keyword = $request->get("keyword");
        $query   = $listsRepository->createQueryBuilder();
        $keyword = "6";

        $all = $listsRepository->findBy(array(
            'title' => new \MongoRegex('/.*薇回.*/i'),
        ));
        dump($all);

//        $query->field('type')->equals($type);

//        $query->addOr($query->expr()->field('type')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));
        $query->field('title')->equals(new \MongoDB\BSON\Regex('/.*' . $keyword . '.*/i'));
//        $query->addOr($query->expr()->field('tags')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));
//        $query->addOr($query->expr()->field('stars')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));
//        $query->addOr($query->expr()->field('director')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));
//        $query->addOr($query->expr()->field('title')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));
//        $query->addOr($query->expr()->field('long_title')->equals(new \MongoRegex('/.*' . $keyword . '.*/i')));'

//        $debug = $query->debug();
//        dump($debug);

//        $s = $query->getQuery();
//        dump($s);


        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 10);

//        dump($pagination);

        $pagination->setParam('keyword', $keyword);
        return $this->render('search/index.html.twig', [
            'pagination' => $pagination,
            'title'      => '搜索结果',
            'keyword'    => $keyword,
        ]);
    }
}

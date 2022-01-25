<?php

namespace App\Controller;

use App\DocumentRepository\IndexListRepository;
use App\DocumentRepository\ListsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\isInstanceOf;

class RetrieveController extends AbstractController
{
    #[Route('/retrieve.html', name: 'retrieve', options: ['sitemap' => true])]
    public function index(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, IndexListRepository $indexListRepository): Response
    {
        $query      = $listsRepository->createQueryBuilder();
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        $down_one = $indexListRepository->findBy(['type' => '本月电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 5);
        $down_two = $indexListRepository->findBy(['type' => '本月电影下载排行'], ["id" => "desc", 'sort' => 'asc'], 5);
        $down     = array_merge($down_one, $down_two);

        return $this->render('retrieve/index.html.twig', [
            'title'      => '索引',
            'pagination' => $pagination,
            'down'       => $down,
        ]);
    }

    #[Route('/retrieve_category/{type}-{tag}-{area}-{view}-{year}.html', name: 'retrieve_category', defaults: ['id' => '0', 'wd' => '', 'area' => '', 'view' => '', 'year' => ''])]
    public function category(ListsRepository $listsRepository, Request $request, PaginatorInterface $paginator, $type, $tag, $area, $view, $year): Response
    {
        $query = $listsRepository->createQueryBuilder();
        if ($type) {
            $query->field('type')->equals($type);
        }

        if ($area) {
            $query->field('area')->equals($area);
        }

        if ($year) {
            $query->field('year')->equals($year);
        }

        if ($tag) {
            $query->field('tags')->equals($tag);
        }

        if ($view == 1) {
            $template = "retrieve/pic_list.html.twig";
        } else {
            $template = "retrieve/list.html.twig";
        }
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render($template, [
            'pagination' => $pagination
        ]);
    }


}

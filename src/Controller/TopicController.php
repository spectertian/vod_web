<?php

namespace App\Controller;

use App\DocumentRepository\TopicListRepository;
use App\DocumentRepository\TopicRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends AbstractController
{
    #[Route('/topic.html', name: 'topic', options: ['sitemap' => true])]
    public function index(TopicRepository $topicRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $topicRepository->createQueryBuilder();
        $query->sort(['date' => 'desc']);
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 20);

        $hotList = $topicRepository->findBy([], ['data' => 'desc'], 9, 3);
        return $this->render('topic/index.html.twig', [
            'title'      => '专题',
            'pagination' => $pagination,
            'hotList'    => $hotList,
        ]);
    }

    #[Route('/topic_list/{id}.html', name: 'topic_list')]
    public function list(TopicListRepository $topicListRepository, TopicRepository $topicRepository, Request $request): Response
    {
        $id        = $request->get('id');
        $topListRe = $topicListRepository->findBy(['topic_id' => $id]);
        $top       = $topicRepository->findOneBy(['id' => (new \MongoId($id))]);
        $newList   = $topicRepository->findBy([], ['n_id' => 'desc'], 9);
        $hotList   = $topicRepository->findBy([], ['n_id' => 'desc'], 9, 3);

        return $this->render('topic/list.html.twig', [
            'title'     => '专题',
            'topListRe' => $topListRe,
            'top'       => $top,
            'newList'   => $newList,
            'hotList'   => $hotList,
        ]);
    }
}

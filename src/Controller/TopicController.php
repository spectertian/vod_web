<?php

namespace App\Controller;

use App\DocumentRepository\TopicListRepository;
use App\DocumentRepository\TopicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends AbstractController
{
    #[Route('/topic', name: 'topic')]
    public function index(TopicRepository $topicRepository): Response
    {
        $topRe   = $topicRepository->findAll();
        $hotList = $topicRepository->findBy([], ['n_id' => 'desc'], 9, 3);
        return $this->render('topic/index.html.twig', [
            'title'   => '专题',
            'topRe'   => $topRe,
            'hotList' => $hotList,
        ]);
    }

    #[Route('/topic_list/{id}', name: 'topic_list')]
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

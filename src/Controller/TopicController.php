<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends AbstractController
{
    #[Route('/topic', name: 'topic')]
    public function index(): Response
    {
        return $this->render('topic/index.html.twig', [
            'title' => '专题',
        ]);
    }

    #[Route('/topic_list/{id}', name: 'topic_list')]
    public function list(Request $request): Response
    {
        return $this->render('topic/list.html.twig', [
            'title' => '专题',
        ]);
    }
}

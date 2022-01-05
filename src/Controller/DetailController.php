<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}', name: 'detail', methods: ['GET'])]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        $id  = $request->get('id');
        $res = $listsRepository->findOneBy(['id' => (new \MongoId($id))]);
        return $this->render('detail/index.html.twig', [
            'res' => $res,
        ]);
    }
}

<?php

namespace App\Controller;

use App\DocumentRepository\ListsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{id}', name: 'detail')]
    public function index(ListsRepository $listsRepository, Request $request): Response
    {
        $id      = $request->query->get('id');
        $listRes = $listsRepository->findOneBy(['id' => $id]);
        return $this->render('detail/index.html.twig', [
            'listRes' => $listRes,
        ]);
    }
}

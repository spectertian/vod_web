<?php

namespace App\Controller;

use App\DocumentRepository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class ImgController extends AbstractController
{
    #[Route('/img/{id}.jpg', name: 'img')]
    public function index(ImageRepository $imageRepository, Request $request): StreamedResponse
    {
        $id       = $request->get("id");
        $stream   = $imageRepository->openDownloadStream($id);
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', "image/jpg");

        $response->setCallback(function () use ($stream) {
            fpassthru($stream);
        });
        return $response;
    }
}

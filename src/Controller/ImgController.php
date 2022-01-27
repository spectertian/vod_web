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
        $id   = $request->get("id");
        $info = $imageRepository->find($id);
        if (!$info) {
            $id = "61f23f8018ef6a4c4d7d5fd7";
        }

        $stream = $imageRepository->openDownloadStream($id);

        $response = new StreamedResponse();
        $response->setPublic();
        $response->setMaxAge(3600);
        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

// forces the response to return a proper 304 response with no content
//        $response->setNotModified();
        $response->headers->set('Content-Type', "image/jpg");

        $response->setCallback(function () use ($stream) {
            fpassthru($stream);
        });
        return $response;
    }
}

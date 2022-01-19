<?php

namespace App\Controller;

use App\DocumentRepository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class ImgController extends AbstractController
{
    #[Route('/img/{id}', name: 'img')]
    public function index(ImageRepository $imageRepository, Request $request): Response
    {
        $id       = $request->get("id");
        $imageRes = $imageRepository->find($id);

        if (null === $imageRes) {
            throw $this->createNotFoundException(sprintf('Upload with id "%s" could not be found', $id));
        }

        $response = new StreamedResponse();
        $response->headers->set('Content-Type', $imageRes->getMimeType());
        $stream = $imageRes->getFile()->getResource();
        $response->setCallback(function () use ($stream) {
            fpassthru($stream);
        });
        return $response;
    }
}

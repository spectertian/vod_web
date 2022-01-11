<?php

namespace App\Controller;

use App\Document\Message;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'message')]
    public function index(): Response
    {

        $task = new Message();
        $form = $this->createForm(MessageType::class, $task);

        return $this->render('message/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

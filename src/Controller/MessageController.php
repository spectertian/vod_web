<?php

namespace App\Controller;

use App\Document\Message;
use App\DocumentRepository\MessageRepository;
use App\Form\MessageType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message.html', name: 'message')]
    public function index(Request $request, DocumentManager $documentManager, MessageRepository $messageRepository): Response
    {

        $message = new Message();
        $form    = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();
            $message->setIp($request->getClientIp());
            $message->setQuestionTime(new \MongoDB\BSON\UTCDateTime());
            $message->setReplayTime(new \MongoDB\BSON\UTCDateTime());
            $documentManager->persist($message);
            $documentManager->flush();

            return $this->redirectToRoute('tip');
        }


        $res = $messageRepository->findBy([], ['replay_time' => "desc"], 3);
        return $this->render('message/index.html.twig', [
            'form' => $form->createView(),
            'res'  => $res,
        ]);
    }
}

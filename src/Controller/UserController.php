<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Emotion;
use App\Entity\Reponse;
use App\Repository\UserRepository;
use App\Repository\EmotionRepository;
use App\Repository\ReponseRepository;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/user", name="user")
     */
    public function default(EmotionRepository $emotionRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

    // or add an optional message - seen by developers
    $this->denyAccessUnlessGranted('ROLE_USER', null, 'Seul le rôle user est authorisé');

    // $user = $this->getUser();

    $emotions = $emotionRepository->findAll();

        return $this->render('user/vote.html.twig', [
            'emotions' => $emotions
        ]);
    }

       /**
     * @Route("user/reponse/{id}", name="reponse")
     */
    public function reponse(Emotion $emotion, EntityManagerInterface $entityManager, EmotionRepository $emotionRepository, ServiceRepository $serviceRepository)
    {
        $user = $this->getUser();
        $service = $serviceRepository->find($user->getService());
        $time = new \DateTime();
        $humeur = $emotionRepository->find($emotion);
        $vote = new Reponse();
        $vote->setDate($time);
        $vote->setEmotion($humeur);
        $vote->setService($service);
        $entityManager->persist($vote);
        $entityManager->flush();

        return $this->render('user/reponse.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    
}
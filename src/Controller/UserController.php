<?php

namespace App\Controller;

use App\Entity\Emotion;
use App\Repository\EmotionRepository;
use App\Repository\ReponseRepository;
use App\Repository\ServiceRepository;
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
    public function reponse(EmotionRepository $emotionRepository, UserRepository $userRepository, ReponseRepository $reponseRepository, ServiceRepository $serviceRepository)
    {
        


        return $this->render('user/reponse.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    
}
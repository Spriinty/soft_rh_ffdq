<?php

namespace App\Controller;

use App\Repository\EmotionRepository;
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
    public function default(UserRepository $userRepository ,EmotionRepository $emotionRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

    // or add an optional message - seen by developers
    $this->denyAccessUnlessGranted('ROLE_USER', null, 'Seul le rôle user est authorisé');
    $user = $userRepository->findAll();
    $emotions = $emotionRepository->findAll();
    
        return $this->render('user/vote.html.twig', [
            'user' => $user,
            'emotions' => $emotions
        ]);
    }

       /**
     * @Route("user/reponse/{id}", name="reponse")
     */
    public function reponse()
    {
        return $this->render('user/reponse.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    
}
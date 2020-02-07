<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\Emotion;
use App\Entity\HasVoted;
use App\Entity\Reponse;
use App\Repository\UserRepository;
use App\Repository\EmotionRepository;
use App\Repository\HasVotedRepository;
use App\Repository\ReponseRepository;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Seul le rôle user est autorisé');

        // $user = $this->getUser();

        $emotions = $emotionRepository->findAll();

        return $this->render('user/vote.html.twig', [
            'emotions' => $emotions
        ]);
    }

       /**
     * @Route("user/reponse/{id}", name="reponse")
     */
    public function reponse(  Emotion $emotion, EntityManagerInterface $entityManager, EmotionRepository $emotionRepository, ServiceRepository $serviceRepository, HasVotedRepository $hasVotedRepository )
    {
        $user = $this->getUser();
        
        $service = $serviceRepository->find($user->getService());
        
        //Nouvelle dateTime
        $time = new \DateTime();

        //On récupère uniquement la date Année-Mois-Jour
        $time->format('Y-m-d');

        $hasVoted = $hasVotedRepository->findOneBy(
            ['date' => $time, 'users' => $user]
        );

        if($hasVoted!==null){
            return $this->render('user/dejavote.html.twig', [
                'controller_name' => $time,
            ]);  
        }
        // dump($hasVoted);die;
        $humeur = $emotionRepository->find($emotion);
        
        // La personne a-t-elle déjà votée?
    
        $vote = new Reponse();

        // $vote->getDate($dateformat);
        // $vote->getNewdate($dateformat);
        $vote->setDate($time);

        $vote->setEmotion($humeur);
        $vote->setService($service);
        // $vote->setService($name);

        $entityManager->persist($vote);
        $entityManager->flush();

        $userHasVoted = new HasVoted();
        $userHasVoted->setDate($time);
        $userHasVoted->setUsers($user);

        $entityManager->persist($userHasVoted);
        $entityManager->flush();

        return $this->render('user/reponse.html.twig', [
            'controller_name' => $time,
        ]);  
         
        // else {
        //     return $this->render('user/dejavote.html.twig', [
        //         'controller_name' => 'UserController',
        //     ]);
        // }
    }
}
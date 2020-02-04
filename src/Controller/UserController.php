<?php

namespace App\Controller;

use App\Form\VoteType;
use App\Entity\Reponse;
use App\Repository\UserRepository;
use App\Repository\EmotionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/user", name="user")
     */
    public function
    default(EmotionRepository $emotionRepository)
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
    public function reponse(Request $request, EmotionRepository $emotionRepository, EntityManagerInterface $entityManager)
    {
        $vote = new Reponse();
        $form = $this->createForm(VoteType::class, $vote);
        $form->handleRequest($request);

        // Si c'est valide et soumis :
        if ($form->isSubmitted() && $form->isValid()) {

            //On insère les données :
            $entityManager->persist($vote);

            //Commit de la base de données
            $entityManager->flush();

            return $this->redirectToRoute('reponse');
        }
        return $this->render('user/reponse.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}

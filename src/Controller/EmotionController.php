<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmotionController extends AbstractController
{
    /**
     * @Route("/emotion", name="emotion")
     */
    public function index()
    {
        return $this->render('emotion/index.html.twig', [
            'controller_name' => 'EmotionController',
        ]);
    }

        /**
     * @Route("/emotion/{id}", name="reponse")
     */
    public function reponse()
    {
        return $this->render('emotion/reponse.html.twig', [
            'controller_name' => 'EmotionController',
        ]);
    }


}

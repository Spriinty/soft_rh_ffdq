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
     * @Route("/emotion/heureux", name="heureux")
     */
    public function heureux()
    {
        return $this->render('emotion/reponse.html.twig', [
            'controller_name' => 'EmotionController',
        ]);
    }

        /**
     * @Route("/emotion/fatigue", name="fatigue")
     */
    public function fatigue()
    {
        return $this->render('emotion/reponse.html.twig', [
            'controller_name' => 'EmotionController',
        ]);
    }
            /**
     * @Route("/emotion/stress", name="stress")
     */
    public function stress()
    {
        return $this->render('emotion/reponse.html.twig', [
            'controller_name' => 'EmotionController',
        ]);
    }
    


}

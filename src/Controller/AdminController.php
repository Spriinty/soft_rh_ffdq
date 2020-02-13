<?php

namespace App\Controller;

use App\Entity\Service;
use App\Repository\EmotionRepository;
use App\Repository\ReponseRepository;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 * 
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     *  Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="admin_day")
     */
    public function day(ReponseRepository $reponseRepository, EmotionRepository $emotionRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Seul le rôle admin est authorisé');
        // $reponses= $reponseRepository->dailyCompanyResponse();
        // // dump($reponses);die;
        // $reponseperservice = $reponseRepository->dailyServiceResponse($id);

        $repository = $this->getDoctrine()->getRepository(Service::class);
        $service = $repository->AllserviceButRH();
        $stat = [];

        $emotions = $emotionRepository->findAll();

        foreach ($service as $value) {
            // $stat[$value['nom']]='';
            $statemotion = [];
            $i = 0;
            foreach ($emotions as $emotion) {

                $reponse = $reponseRepository->dailyServiceResponse($value['id'], $emotion->getId());
                $statemotion[$emotion->getName()][$i]['label'] = $emotion->getName();
                $statemotion[$emotion->getName()][$i]['data'][] = $reponse['count'];
                switch ($emotion->getName()) {
                    case 'Heureux':
                        $bgColor = '#f16731';
                        break;
                    case 'Fatigué':
                        $bgColor = '#2c786c';
                        break;
                    case 'Stressé':
                        $bgColor = '#f8b400';
                        break;
                }
                $statemotion[$emotion->getName()][$i]['backgroundColor'][] = $bgColor;
                $i++;
            }
            // $stat[$value['nom']]= $statemotion; 
        }

        $dailycompanystat = [];
        $i = 0;
        foreach ($emotions as $value) {
            $reponse = $reponseRepository->dailyCompanyResponse($value->getId());
            $dailycompanystat[$i]['label'] = $value->getName();
            $dailycompanystat[$i]['data'][] = $reponse['count'];
            switch ($value->getName()) {
                case 'Heureux':
                    $bgColor = '#f16731';
                    break;
                case 'Fatigué':
                    $bgColor = '#2c786c';
                    break;
                case 'Stressé':
                    $bgColor = '#f8b400';
                    break;
            }
            $dailycompanystat[$i]['backgroundColor'][] = $bgColor;
            $i++;
        }

        return $this->render('admin/sondage.html.twig', [
            'stat' => json_encode($statemotion),
            'dailycompanyreponse' => json_encode($dailycompanystat)
        ]);
    }

    /**
     *  Require ROLE_ADMIN for only this controller method.
     * 
     *  @IsGranted("ROLE_ADMIN")
     * @Route("/admin/month", name="admin_month")
     */
    public function month(ReponseRepository $reponseRepository, EmotionRepository $emotionRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Seul le rôle admin est authorisé');
        // $reponses= $reponseRepository->dailyCompanyResponse();
        // dump($reponses);die;
        // $reponseperservice = $reponseRepository->dailyServiceResponse($id);

        $repository = $this->getDoctrine()->getRepository(Service::class);
        $service = $repository->AllserviceButRH();
        $monthstat = [];

        $emotions = $emotionRepository->findAll();

        foreach ($service as $value) {
            $monthstat[$value['nom']] = '';
            $monthstatemotion = [];
            foreach ($emotions as $emotion) {

                $reponse = $reponseRepository->monthlyServiceResponse($value['id'], $emotion->getId());
                $monthstatemotion[$emotion->getName()] = $reponse['count'];
            }
            $monthstat[$value['nom']] = $monthstatemotion;
        }

        //    dump($monthstat);die;
        return $this->render('admin/sondage.html.twig', [
            'monthstat' => $monthstat,
        ]);
    }
}

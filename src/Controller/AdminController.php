<?php

namespace App\Controller;

use App\Entity\Service;
use App\Repository\ReponseRepository;
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
     * @Route("/admin", name="admin")
     */
    public function admin(ReponseRepository $reponseRepository)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Seul le rôle admin est authorisé');
        // $reponses= $reponseRepository->dailyCompanyResponse();
        // // dump($reponses);die;
        // $reponseperservice = $reponseRepository->dailyServiceResponse($id);

        $repository = $this->getDoctrine()->getRepository(Service::class);
        $service = $repository->AllserviceButRH();
        dump($service);
        die;



        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}

<?php

namespace App\Repository;

use App\Entity\Reponse;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


/**
 * @method Reponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reponse[]    findAll()
 * @method Reponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reponse::class);
    }

    public function dailyCompanyResponse(){

        $today= new \DateTime();
        $currentdate=$today->format('Y-m-d');

        return $this->createQueryBuilder('r')
        ->select('COUNT(r.emotion)')
        ->where("r.date >= :today")
        ->groupby('r.emotion')
        ->setParameter('today', $currentdate)
        ->getQuery()
        ->getResult();
    }

    public function dailyServiceResponse($serviceid){

        return $this->createQueryBuilder('r')
        ->select('e.name, count(r.id) AS count')
        ->join('r.emotion', 'e')
        ->where('r.service = :service')
        ->groupby('e.name')
        ->setParameter('service', $serviceid)
        ->getQuery()
        ->getResult();
    }


    // /**
    //  * @return Reponse[] Returns an array of Reponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reponse
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

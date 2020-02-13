<?php

namespace App\Repository;

use App\Entity\Reponse;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;


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

    public function dailyCompanyResponse($emotion){

        $today= new \DateTime();
        $currentdate=$today->format('Y-m-d');

        $dbq=$this->createQueryBuilder('r')
        ->select('COUNT(r.emotion) AS count')
        ->where("r.date >= :today")
        ->andWhere('r.emotion = :emotion')
        ->setParameter('today', $currentdate)
        ->setParameter('emotion', $emotion)
        ->getQuery()
        ->getResult();
        return $dbq[0];
    }

    public function dailyServiceResponse($serviceid, $emotionid){

        $todayperservice= new \DateTime();
        $currentdateperservice=$todayperservice->format('Y-m-d');

        $dbq = $this->createQueryBuilder('r')
         ->select('count(r.id) AS count')
         ->where('r.service = :service') 
         ->andWhere('r.emotion = :emotion')
         ->andWhere('r.date = :currentdate')
         ->setParameter('service', $serviceid)
         ->setParameter('emotion', $emotionid)
         ->setParameter('currentdate', $currentdateperservice)
         ->getQuery()
         ->getResult();
         return $dbq[0];
    }

    public function monthlyServiceResponse($serviceid, $emotionid){

        $monthlyperservice= new \DateTime();
        $currentmonthperservice=$monthlyperservice->format('Y-m');

        $dbq = $this->createQueryBuilder('r')
         ->select('count(r.id) AS count')
         ->where('r.service = :service') 
         ->andWhere('r.emotion = :emotion')
         ->andWhere('r.date LIKE :currentmonth')
         ->setParameter('service', $serviceid)
         ->setParameter('emotion', $emotionid)
         ->setParameter('currentmonth', $currentmonthperservice. '-%')
         ->getQuery()
         ->getResult();
         return $dbq[0];
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

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

        // $todayperservice= new \DateTime();
        // $currentdateperservice=$todayperservice->format('Y-m-d');

        // return $this->createQueryBuilder('r')
        // ->select('s.id, count(CASE WHEN r.date = :date) AS count')
        // ->join('r.service', 's')
        // ->where('r.service = :service')
        // ->groupby('e.name')
        // ->setParameter( 'service', $serviceid )
        // ->getQuery()
        // ->getResult();

        // $sql = 'SELECT d.id 
        // as departement_id , count(case when v.date= :day then 1 end) 
        // as nbrVotantParDepartement, GROUP_CONCAT( CASE WHEN v.date = :day THEN v.humeur_id END ) 
        // AS humeur 
        // from departement d 
        // left join vote v 
        // on v.departement_id=d.id 
        // group by d.nom 
        // order by d.id 
        // asc';

        //On sélectionne le n° de service
        // Dans le cas où la date de la réponse est égale à la date du jour,
        //

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

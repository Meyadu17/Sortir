<?php

namespace App\Repository;

use App\Entity\SITES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SITES|null find($id, $lockMode = null, $lockVersion = null)
 * @method SITES|null findOneBy(array $criteria, array $orderBy = null)
 * @method SITES[]    findAll()
 * @method SITES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SITESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SITES::class);
    }

    // /**
    //  * @return SITES[] Returns an array of SITES objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SITES
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

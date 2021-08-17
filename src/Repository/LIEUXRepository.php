<?php

namespace App\Repository;

use App\Entity\LIEUX;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LIEUX|null find($id, $lockMode = null, $lockVersion = null)
 * @method LIEUX|null findOneBy(array $criteria, array $orderBy = null)
 * @method LIEUX[]    findAll()
 * @method LIEUX[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LIEUXRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LIEUX::class);
    }

    // /**
    //  * @return LIEUX[] Returns an array of LIEUX objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LIEUX
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

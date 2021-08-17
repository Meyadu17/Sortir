<?php

namespace App\Repository;

use App\Entity\SORTIES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SORTIES|null find($id, $lockMode = null, $lockVersion = null)
 * @method SORTIES|null findOneBy(array $criteria, array $orderBy = null)
 * @method SORTIES[]    findAll()
 * @method SORTIES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SORTIESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SORTIES::class);
    }

    // /**
    //  * @return SORTIES[] Returns an array of SORTIES objects
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
    public function findOneBySomeField($value): ?SORTIES
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

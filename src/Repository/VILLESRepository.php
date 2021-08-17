<?php

namespace App\Repository;

use App\Entity\VILLES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VILLES|null find($id, $lockMode = null, $lockVersion = null)
 * @method VILLES|null findOneBy(array $criteria, array $orderBy = null)
 * @method VILLES[]    findAll()
 * @method VILLES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VILLESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VILLES::class);
    }

    // /**
    //  * @return VILLES[] Returns an array of VILLES objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VILLES
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

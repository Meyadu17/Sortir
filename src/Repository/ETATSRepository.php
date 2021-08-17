<?php

namespace App\Repository;

use App\Entity\ETATS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ETATS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ETATS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ETATS[]    findAll()
 * @method ETATS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ETATSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ETATS::class);
    }

    // /**
    //  * @return ETATS[] Returns an array of ETATS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ETATS
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

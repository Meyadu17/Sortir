<?php

namespace App\Repository;

use App\Entity\PARTICIPANTS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PARTICIPANTS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PARTICIPANTS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PARTICIPANTS[]    findAll()
 * @method PARTICIPANTS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PARTICIPANTSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PARTICIPANTS::class);
    }

    // /**
    //  * @return PARTICIPANTS[] Returns an array of PARTICIPANTS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PARTICIPANTS
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

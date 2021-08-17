<?php

namespace App\Repository;

use App\Entity\INSCRIPTIONS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method INSCRIPTIONS|null find($id, $lockMode = null, $lockVersion = null)
 * @method INSCRIPTIONS|null findOneBy(array $criteria, array $orderBy = null)
 * @method INSCRIPTIONS[]    findAll()
 * @method INSCRIPTIONS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class INSCRIPTIONSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, INSCRIPTIONS::class);
    }

    // /**
    //  * @return INSCRIPTIONS[] Returns an array of INSCRIPTIONS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?INSCRIPTIONS
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

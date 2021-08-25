<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Request;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    public function findByFilter($nomSortie, $idSite)
    {

        $qb = $this->createQueryBuilder('s');
        $qb
            ->andWhere('s.nom like :nom')
            ->setParameter(':nom', '%'.$nomSortie.'%');

        if ($idSite) {
            $qb -> andWhere('s.sites = :idSite')
                ->setParameter(':idSite', $idSite);
        }

        $query = $qb->getQuery();
        return $query->getResult();
    }

}


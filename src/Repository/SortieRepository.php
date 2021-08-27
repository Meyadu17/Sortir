<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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

    public function findByFilter($nomSortie, $idSite, $date1, $date2, $orga, $inscrit,$nonInscrit,$sortiesEnd)
    {

        $qb = $this->createQueryBuilder('s');

        $qb
            ->andWhere('s.nom like :nom')
            ->setParameter(':nom', '%'.$nomSortie.'%');

        if ($idSite) {
            $qb -> andWhere('s.sites = :idSite')
                ->setParameter(':idSite', $idSite);
        }

        if ($date1){
            $qb ->andWhere('s.dateHeureDebut >= :date1')
                ->setParameter(':date1', $date1);
        }
        if ($date2){
            $qb ->andWhere('s.dateHeureDebut <= :date2')
                ->setParameter(':date2', $date2);
        }
        if ($orga){
            $qb ->andWhere('s.organisateur = :orga')
                ->setParameter(':orga', $orga);
            
        }
        if ($inscrit){
            $qb ->join('s.participants', 'p')
                ->andWhere('p = :inscrit')
                ->setParameter(':inscrit', $inscrit );
        }
        if ($nonInscrit && !$inscrit) {
            $qbInscrit = $this->createQueryBuilder('s2')
                ->select('s2.id')
                ->join('s2.participants', 'p2')
                ->andWhere('p2 = :inscrit ');
            $qb
                ->andWhere('s.id not in(' . $qbInscrit->getDQL() . ')')
                ->setParameter(':inscrit', $nonInscrit);
        }
        if ($sortiesEnd){
            $qb ->andWhere('s.dateHeureDebut <= :sortiesEnd')
                ->setParameter(':sortiesEnd', $sortiesEnd);
        }
        $query = $qb->getQuery();
        return $query->getResult();
    }

}


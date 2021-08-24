<?php

namespace App\Repository;

use App\Entity\Participant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Participant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participant[]    findAll()
 * @method Participant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participant::class);
    }

    public function modifierProfile ()
    {
        $qb = $this->createQueryBuilder();
        $qb ->update('App/Entity/Participant', 'p')
            ->set('p.pseudo', ':pseudo')
            ->set('p.prenom', ':prenom')
            ->set('p.nom', ':nom')
            ->set('p.telephone', ':telephone')
            ->set('p.mail', ':mail')
            ->set('p.mot_de_passe', ':mot_de_passe')
            ->set('p.site', ':site')
            ->getQuery();

        $query = $qb->getQuery();
        return $query->getResult();
    }

}

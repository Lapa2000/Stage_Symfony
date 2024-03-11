<?php

namespace App\Repository;

use App\Entity\LigneDevisClientsFromFactures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneDevisClientsFromFactures>
 *
 * @method LigneDevisClientsFromFactures|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDevisClientsFromFactures|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDevisClientsFromFactures[]    findAll()
 * @method LigneDevisClientsFromFactures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDevisClientsFromFacturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneDevisClientsFromFactures::class);
    }

    //    /**
    //     * @return LigneDevisClientsFromFactures[] Returns an array of LigneDevisClientsFromFactures objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LigneDevisClientsFromFactures
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

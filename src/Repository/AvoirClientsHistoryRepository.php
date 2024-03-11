<?php

namespace App\Repository;

use App\Entity\AvoirClientsHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvoirClientsHistory>
 *
 * @method AvoirClientsHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvoirClientsHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvoirClientsHistory[]    findAll()
 * @method AvoirClientsHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvoirClientsHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvoirClientsHistory::class);
    }

    //    /**
    //     * @return AvoirClientsHistory[] Returns an array of AvoirClientsHistory objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AvoirClientsHistory
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

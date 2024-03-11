<?php

namespace App\Repository;

use App\Entity\ErpEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpEvent>
 *
 * @method ErpEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpEvent[]    findAll()
 * @method ErpEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpEvent::class);
    }

    //    /**
    //     * @return ErpEvent[] Returns an array of ErpEvent objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ErpEvent
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

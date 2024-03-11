<?php

namespace App\Repository;

use App\Entity\ErpPays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpPays>
 *
 * @method ErpPays|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpPays|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpPays[]    findAll()
 * @method ErpPays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpPaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpPays::class);
    }

    //    /**
    //     * @return ErpPays[] Returns an array of ErpPays objects
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

    //    public function findOneBySomeField($value): ?ErpPays
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

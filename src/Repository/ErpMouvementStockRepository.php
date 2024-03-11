<?php

namespace App\Repository;

use App\Entity\ErpMouvementStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpMouvementStock>
 *
 * @method ErpMouvementStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpMouvementStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpMouvementStock[]    findAll()
 * @method ErpMouvementStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpMouvementStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpMouvementStock::class);
    }

    //    /**
    //     * @return ErpMouvementStock[] Returns an array of ErpMouvementStock objects
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

    //    public function findOneBySomeField($value): ?ErpMouvementStock
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

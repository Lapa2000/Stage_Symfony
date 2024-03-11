<?php

namespace App\Repository;

use App\Entity\ErpConsomationParc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpConsomationParc>
 *
 * @method ErpConsomationParc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpConsomationParc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpConsomationParc[]    findAll()
 * @method ErpConsomationParc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpConsomationParcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpConsomationParc::class);
    }

    //    /**
    //     * @return ErpConsomationParc[] Returns an array of ErpConsomationParc objects
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

    //    public function findOneBySomeField($value): ?ErpConsomationParc
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

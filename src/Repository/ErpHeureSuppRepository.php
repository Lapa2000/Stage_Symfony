<?php

namespace App\Repository;

use App\Entity\ErpHeureSupp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpHeureSupp>
 *
 * @method ErpHeureSupp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpHeureSupp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpHeureSupp[]    findAll()
 * @method ErpHeureSupp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpHeureSuppRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpHeureSupp::class);
    }

    //    /**
    //     * @return ErpHeureSupp[] Returns an array of ErpHeureSupp objects
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

    //    public function findOneBySomeField($value): ?ErpHeureSupp
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

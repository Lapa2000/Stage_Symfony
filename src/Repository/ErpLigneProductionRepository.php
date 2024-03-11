<?php

namespace App\Repository;

use App\Entity\ErpLigneProduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpLigneProduction>
 *
 * @method ErpLigneProduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpLigneProduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpLigneProduction[]    findAll()
 * @method ErpLigneProduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpLigneProductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpLigneProduction::class);
    }

    //    /**
    //     * @return ErpLigneProduction[] Returns an array of ErpLigneProduction objects
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

    //    public function findOneBySomeField($value): ?ErpLigneProduction
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

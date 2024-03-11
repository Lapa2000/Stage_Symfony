<?php

namespace App\Repository;

use App\Entity\ErpFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpFormation>
 *
 * @method ErpFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpFormation[]    findAll()
 * @method ErpFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpFormation::class);
    }

    //    /**
    //     * @return ErpFormation[] Returns an array of ErpFormation objects
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

    //    public function findOneBySomeField($value): ?ErpFormation
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

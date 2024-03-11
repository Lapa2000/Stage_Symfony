<?php

namespace App\Repository;

use App\Entity\ErpPistes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpPistes>
 *
 * @method ErpPistes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpPistes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpPistes[]    findAll()
 * @method ErpPistes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpPistesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpPistes::class);
    }

    //    /**
    //     * @return ErpPistes[] Returns an array of ErpPistes objects
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

    //    public function findOneBySomeField($value): ?ErpPistes
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

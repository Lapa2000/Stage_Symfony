<?php

namespace App\Repository;

use App\Entity\ErpEcritureComptable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpEcritureComptable>
 *
 * @method ErpEcritureComptable|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpEcritureComptable|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpEcritureComptable[]    findAll()
 * @method ErpEcritureComptable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpEcritureComptableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpEcritureComptable::class);
    }

    //    /**
    //     * @return ErpEcritureComptable[] Returns an array of ErpEcritureComptable objects
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

    //    public function findOneBySomeField($value): ?ErpEcritureComptable
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

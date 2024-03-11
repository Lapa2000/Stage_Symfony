<?php

namespace App\Repository;

use App\Entity\ErpLocationParc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpLocationParc>
 *
 * @method ErpLocationParc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpLocationParc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpLocationParc[]    findAll()
 * @method ErpLocationParc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpLocationParcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpLocationParc::class);
    }

    //    /**
    //     * @return ErpLocationParc[] Returns an array of ErpLocationParc objects
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

    //    public function findOneBySomeField($value): ?ErpLocationParc
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

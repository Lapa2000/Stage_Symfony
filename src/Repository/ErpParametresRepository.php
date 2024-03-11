<?php

namespace App\Repository;

use App\Entity\ErpParametres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpParametres>
 *
 * @method ErpParametres|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpParametres|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpParametres[]    findAll()
 * @method ErpParametres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpParametresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpParametres::class);
    }

    //    /**
    //     * @return ErpParametres[] Returns an array of ErpParametres objects
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

    //    public function findOneBySomeField($value): ?ErpParametres
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

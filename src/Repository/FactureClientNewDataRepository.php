<?php

namespace App\Repository;

use App\Entity\FactureClientNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FactureClientNewData>
 *
 * @method FactureClientNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureClientNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureClientNewData[]    findAll()
 * @method FactureClientNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureClientNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureClientNewData::class);
    }

    //    /**
    //     * @return FactureClientNewData[] Returns an array of FactureClientNewData objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FactureClientNewData
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

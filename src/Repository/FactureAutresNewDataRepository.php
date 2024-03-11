<?php

namespace App\Repository;

use App\Entity\FactureAutresNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FactureAutresNewData>
 *
 * @method FactureAutresNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureAutresNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureAutresNewData[]    findAll()
 * @method FactureAutresNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureAutresNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureAutresNewData::class);
    }

    //    /**
    //     * @return FactureAutresNewData[] Returns an array of FactureAutresNewData objects
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

    //    public function findOneBySomeField($value): ?FactureAutresNewData
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

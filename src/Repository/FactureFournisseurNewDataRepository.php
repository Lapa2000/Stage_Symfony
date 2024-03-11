<?php

namespace App\Repository;

use App\Entity\FactureFournisseurNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FactureFournisseurNewData>
 *
 * @method FactureFournisseurNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactureFournisseurNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactureFournisseurNewData[]    findAll()
 * @method FactureFournisseurNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureFournisseurNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactureFournisseurNewData::class);
    }

    //    /**
    //     * @return FactureFournisseurNewData[] Returns an array of FactureFournisseurNewData objects
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

    //    public function findOneBySomeField($value): ?FactureFournisseurNewData
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

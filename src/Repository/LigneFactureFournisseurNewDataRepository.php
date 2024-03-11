<?php

namespace App\Repository;

use App\Entity\LigneFactureFournisseurNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneFactureFournisseurNewData>
 *
 * @method LigneFactureFournisseurNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFactureFournisseurNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFactureFournisseurNewData[]    findAll()
 * @method LigneFactureFournisseurNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFactureFournisseurNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFactureFournisseurNewData::class);
    }

    //    /**
    //     * @return LigneFactureFournisseurNewData[] Returns an array of LigneFactureFournisseurNewData objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LigneFactureFournisseurNewData
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\LigneDevisligneFactureClientNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneDevisligneFactureClientNewData>
 *
 * @method LigneDevisligneFactureClientNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDevisligneFactureClientNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDevisligneFactureClientNewData[]    findAll()
 * @method LigneDevisligneFactureClientNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDevisligneFactureClientNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneDevisligneFactureClientNewData::class);
    }

    //    /**
    //     * @return LigneDevisligneFactureClientNewData[] Returns an array of LigneDevisligneFactureClientNewData objects
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

    //    public function findOneBySomeField($value): ?LigneDevisligneFactureClientNewData
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

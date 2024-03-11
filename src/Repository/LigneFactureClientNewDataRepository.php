<?php

namespace App\Repository;

use App\Entity\LigneFactureClientNewData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneFactureClientNewData>
 *
 * @method LigneFactureClientNewData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFactureClientNewData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFactureClientNewData[]    findAll()
 * @method LigneFactureClientNewData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFactureClientNewDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFactureClientNewData::class);
    }

//    /**
//     * @return LigneFactureClientNewData[] Returns an array of LigneFactureClientNewData objects
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

//    public function findOneBySomeField($value): ?LigneFactureClientNewData
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

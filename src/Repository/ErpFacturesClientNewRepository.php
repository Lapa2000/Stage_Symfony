<?php

namespace App\Repository;

use App\Entity\ErpFacturesClientNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpFacturesClientNew>
 *
 * @method ErpFacturesClientNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpFacturesClientNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpFacturesClientNew[]    findAll()
 * @method ErpFacturesClientNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpFacturesClientNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpFacturesClientNew::class);
    }

    //    /**
    //     * @return ErpFacturesClientNew[] Returns an array of ErpFacturesClientNew objects
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

    //    public function findOneBySomeField($value): ?ErpFacturesClientNew
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

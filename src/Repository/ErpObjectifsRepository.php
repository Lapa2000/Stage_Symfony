<?php

namespace App\Repository;

use App\Entity\ErpObjectifs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpObjectifs>
 *
 * @method ErpObjectifs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpObjectifs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpObjectifs[]    findAll()
 * @method ErpObjectifs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpObjectifsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpObjectifs::class);
    }

    //    /**
    //     * @return ErpObjectifs[] Returns an array of ErpObjectifs objects
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

    //    public function findOneBySomeField($value): ?ErpObjectifs
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

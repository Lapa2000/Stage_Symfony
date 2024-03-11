<?php

namespace App\Repository;

use App\Entity\ErpDevisClientNewFromFactures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpDevisClientNewFromFactures>
 *
 * @method ErpDevisClientNewFromFactures|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpDevisClientNewFromFactures|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpDevisClientNewFromFactures[]    findAll()
 * @method ErpDevisClientNewFromFactures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpDevisClientNewFromFacturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpDevisClientNewFromFactures::class);
    }

    //    /**
    //     * @return ErpDevisClientNewFromFactures[] Returns an array of ErpDevisClientNewFromFactures objects
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

    //    public function findOneBySomeField($value): ?ErpDevisClientNewFromFactures
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

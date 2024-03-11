<?php

namespace App\Repository;

use App\Entity\ErpTache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpTache>
 *
 * @method ErpTache|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpTache|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpTache[]    findAll()
 * @method ErpTache[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpTacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpTache::class);
    }

    //    /**
    //     * @return ErpTache[] Returns an array of ErpTache objects
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

    //    public function findOneBySomeField($value): ?ErpTache
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

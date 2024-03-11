<?php

namespace App\Repository;

use App\Entity\ErpFacturesClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpFacturesClient>
 *
 * @method ErpFacturesClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpFacturesClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpFacturesClient[]    findAll()
 * @method ErpFacturesClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpFacturesClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpFacturesClient::class);
    }

    //    /**
    //     * @return ErpFacturesClient[] Returns an array of ErpFacturesClient objects
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

    //    public function findOneBySomeField($value): ?ErpFacturesClient
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

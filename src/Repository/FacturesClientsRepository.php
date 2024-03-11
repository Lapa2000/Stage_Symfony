<?php

namespace App\Repository;

use App\Entity\FacturesClients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FacturesClients>
 *
 * @method FacturesClients|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacturesClients|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacturesClients[]    findAll()
 * @method FacturesClients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturesClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacturesClients::class);
    }

    //    /**
    //     * @return FacturesClients[] Returns an array of FacturesClients objects
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

    //    public function findOneBySomeField($value): ?FacturesClients
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

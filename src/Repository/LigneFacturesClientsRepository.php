<?php

namespace App\Repository;

use App\Entity\LigneFacturesClients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneFacturesClients>
 *
 * @method LigneFacturesClients|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFacturesClients|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFacturesClients[]    findAll()
 * @method LigneFacturesClients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFacturesClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFacturesClients::class);
    }

    //    /**
    //     * @return LigneFacturesClients[] Returns an array of LigneFacturesClients objects
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

    //    public function findOneBySomeField($value): ?LigneFacturesClients
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\ErpLigneFacturesClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpLigneFacturesClient>
 *
 * @method ErpLigneFacturesClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpLigneFacturesClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpLigneFacturesClient[]    findAll()
 * @method ErpLigneFacturesClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpLigneFacturesClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpLigneFacturesClient::class);
    }

    //    /**
    //     * @return ErpLigneFacturesClient[] Returns an array of ErpLigneFacturesClient objects
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

    //    public function findOneBySomeField($value): ?ErpLigneFacturesClient
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\ErpClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpClient>
 *
 * @method ErpClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpClient[]    findAll()
 * @method ErpClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpClient::class);
    }

    //    /**
    //     * @return ErpClient[] Returns an array of ErpClient objects
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

    //    public function findOneBySomeField($value): ?ErpClient
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

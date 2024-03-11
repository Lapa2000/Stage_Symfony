<?php

namespace App\Repository;

use App\Entity\ErpCommandeClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpCommandeClient>
 *
 * @method ErpCommandeClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpCommandeClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpCommandeClient[]    findAll()
 * @method ErpCommandeClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpCommandeClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpCommandeClient::class);
    }

    //    /**
    //     * @return ErpCommandeClient[] Returns an array of ErpCommandeClient objects
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

    //    public function findOneBySomeField($value): ?ErpCommandeClient
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

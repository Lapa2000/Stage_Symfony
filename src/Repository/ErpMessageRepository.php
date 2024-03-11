<?php

namespace App\Repository;

use App\Entity\ErpMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpMessage>
 *
 * @method ErpMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpMessage[]    findAll()
 * @method ErpMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpMessage::class);
    }

    //    /**
    //     * @return ErpMessage[] Returns an array of ErpMessage objects
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

    //    public function findOneBySomeField($value): ?ErpMessage
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

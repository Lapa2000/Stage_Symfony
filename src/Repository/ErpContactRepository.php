<?php

namespace App\Repository;

use App\Entity\ErpContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpContact>
 *
 * @method ErpContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpContact[]    findAll()
 * @method ErpContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpContact::class);
    }

    //    /**
    //     * @return ErpContact[] Returns an array of ErpContact objects
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

    //    public function findOneBySomeField($value): ?ErpContact
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

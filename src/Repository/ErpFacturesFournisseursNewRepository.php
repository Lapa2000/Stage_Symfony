<?php

namespace App\Repository;

use App\Entity\ErpFacturesFournisseursNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpFacturesFournisseursNew>
 *
 * @method ErpFacturesFournisseursNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpFacturesFournisseursNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpFacturesFournisseursNew[]    findAll()
 * @method ErpFacturesFournisseursNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpFacturesFournisseursNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpFacturesFournisseursNew::class);
    }

    //    /**
    //     * @return ErpFacturesFournisseursNew[] Returns an array of ErpFacturesFournisseursNew objects
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

    //    public function findOneBySomeField($value): ?ErpFacturesFournisseursNew
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

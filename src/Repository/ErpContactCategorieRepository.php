<?php

namespace App\Repository;

use App\Entity\ErpContactCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpContactCategorie>
 *
 * @method ErpContactCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpContactCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpContactCategorie[]    findAll()
 * @method ErpContactCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpContactCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpContactCategorie::class);
    }

    //    /**
    //     * @return ErpContactCategorie[] Returns an array of ErpContactCategorie objects
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

    //    public function findOneBySomeField($value): ?ErpContactCategorie
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

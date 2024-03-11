<?php

namespace App\Repository;

use App\Entity\ErpIntervenantCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpIntervenantCategorie>
 *
 * @method ErpIntervenantCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpIntervenantCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpIntervenantCategorie[]    findAll()
 * @method ErpIntervenantCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpIntervenantCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpIntervenantCategorie::class);
    }

    //    /**
    //     * @return ErpIntervenantCategorie[] Returns an array of ErpIntervenantCategorie objects
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

    //    public function findOneBySomeField($value): ?ErpIntervenantCategorie
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

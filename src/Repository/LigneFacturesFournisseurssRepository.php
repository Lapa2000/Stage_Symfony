<?php

namespace App\Repository;

use App\Entity\LigneFacturesFournisseurss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneFacturesFournisseurss>
 *
 * @method LigneFacturesFournisseurss|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFacturesFournisseurss|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFacturesFournisseurss[]    findAll()
 * @method LigneFacturesFournisseurss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFacturesFournisseurssRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFacturesFournisseurss::class);
    }

    //    /**
    //     * @return LigneFacturesFournisseurss[] Returns an array of LigneFacturesFournisseurss objects
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

    //    public function findOneBySomeField($value): ?LigneFacturesFournisseurss
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

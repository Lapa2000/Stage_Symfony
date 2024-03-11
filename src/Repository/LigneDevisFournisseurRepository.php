<?php

namespace App\Repository;

use App\Entity\LigneDevisFournisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneDevisFournisseur>
 *
 * @method LigneDevisFournisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDevisFournisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDevisFournisseur[]    findAll()
 * @method LigneDevisFournisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDevisFournisseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneDevisFournisseur::class);
    }

    //    /**
    //     * @return LigneDevisFournisseur[] Returns an array of LigneDevisFournisseur objects
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

    //    public function findOneBySomeField($value): ?LigneDevisFournisseur
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

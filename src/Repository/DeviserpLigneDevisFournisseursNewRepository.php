<?php

namespace App\Repository;

use App\Entity\DeviserpLigneDevisFournisseursNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DeviserpLigneDevisFournisseursNew>
 *
 * @method DeviserpLigneDevisFournisseursNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeviserpLigneDevisFournisseursNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeviserpLigneDevisFournisseursNew[]    findAll()
 * @method DeviserpLigneDevisFournisseursNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeviserpLigneDevisFournisseursNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeviserpLigneDevisFournisseursNew::class);
    }

    //    /**
    //     * @return DeviserpLigneDevisFournisseursNew[] Returns an array of DeviserpLigneDevisFournisseursNew objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DeviserpLigneDevisFournisseursNew
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\betaal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method betaal|null find($id, $lockMode = null, $lockVersion = null)
 * @method betaal|null findOneBy(array $criteria, array $orderBy = null)
 * @method betaal[]    findAll()
 * @method betaal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BetaalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, betaal::class);
    }

    // /**
    //  * @return betaal[] Returns an array of betaal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?betaal
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

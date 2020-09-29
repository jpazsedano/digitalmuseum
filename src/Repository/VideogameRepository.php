<?php

namespace App\Repository;

use App\Entity\Videogame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Videogame|null find($id, $lockMode = null, $lockVersion = null)
 * @method Videogame|null findOneBy(array $criteria, array $orderBy = null)
 * @method Videogame[]    findAll()
 * @method Videogame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideogameRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 10;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Videogame::class);
    }

    public function getVideogamePaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder()
            ->setMaxResult(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery();

        return new Paginator($query);
    }

    // /**
    //  * @return Videogame[] Returns an array of Videogame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Videogame
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

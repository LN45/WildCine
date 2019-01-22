<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function findMoviesBetweenTwoDates()
    {
        $movieDate = new \DateTime();
        $movieDate->sub(new \DateInterval('P2Y'));

        $qb=$this->createQueryBuilder('m')
            ->where('m.year >= :date')
            ->setParameter('date', $movieDate->format('Y-m-d'))
            ->getQuery();

        $results = $qb->getResult();

        return $results;
    }

    /**
     * @return mixed
     */
    public function findBestMovies()
    {
        $bestMovie = "4";
        $qb=$this->createQueryBuilder('m')
            ->where('m.critics >= :critics')
            ->setParameter('critics', $bestMovie)
            ->getQuery();

        $results = $qb->getResult();

        return $results;
    }

//    public function findOneBySomeField($value): ?Movie
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}

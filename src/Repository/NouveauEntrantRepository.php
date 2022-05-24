<?php

namespace App\Repository;

use App\Entity\NouveauEntrant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NouveauEntrant>
 *
 * @method NouveauEntrant|null find($id, $lockMode = null, $lockVersion = null)
 * @method NouveauEntrant|null findOneBy(array $criteria, array $orderBy = null)
 * @method NouveauEntrant[]    findAll()
 * @method NouveauEntrant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NouveauEntrantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NouveauEntrant::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(NouveauEntrant $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(NouveauEntrant $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return NouveauEntrant[] Returns an array of NouveauEntrant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NouveauEntrant
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

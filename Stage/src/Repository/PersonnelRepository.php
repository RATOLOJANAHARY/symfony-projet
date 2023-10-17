<?php

namespace App\Repository;

use App\Entity\Personnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Personnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personnel[]    findAll()
 * @method Personnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personnel::class);
    }

    // /**
    //  * @return Personnel[] Returns an array of Personnel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function affichageECD()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT CIN, Nom, Prenom, Sexe, codeservice, date_entre, code_grade, if ( LENGTH(`date_entre`)=10,(YEAR(CURDATE()) - YEAR(`date_entre`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_entre`), '-', DAY(`date_entre`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_entre,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as anneservice, if ( LENGTH(`date_naissance`)=10,(YEAR(CURDATE()) - YEAR(`date_naissance`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_naissance`), '-', DAY(`date_naissance`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_naissance,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as age FROM personnel, grade, service WHERE (personnel.service_id = service.id) AND (personnel.grade_id = grade.id) AND grade.code_grade = 'ECD'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

 
    }

    public function affichageEFA()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT CIN, Nom, Prenom, Sexe, codeservice, date_entre, code_grade, if ( LENGTH(`date_entre`)=10,(YEAR(CURDATE()) - YEAR(`date_entre`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_entre`), '-', DAY(`date_entre`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_entre,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as anneservice, if ( LENGTH(`date_naissance`)=10,(YEAR(CURDATE()) - YEAR(`date_naissance`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_naissance`), '-', DAY(`date_naissance`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_naissance,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as age FROM personnel, grade, service WHERE (personnel.service_id = service.id) AND (personnel.grade_id = grade.id) AND grade.code_grade = 'EFA'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

 
    }

     public function affichageELD()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT CIN, Nom, Prenom, Sexe, codeservice, date_entre, code_grade, if ( LENGTH(`date_entre`)=10,(YEAR(CURDATE()) - YEAR(`date_entre`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_entre`), '-', DAY(`date_entre`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_entre,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as anneservice, if ( LENGTH(`date_naissance`)=10,(YEAR(CURDATE()) - YEAR(`date_naissance`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_naissance`), '-', DAY(`date_naissance`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_naissance,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as age FROM personnel, grade, service WHERE (personnel.service_id = service.id) AND (personnel.grade_id = grade.id) AND grade.code_grade = 'ELD'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

 
    }

    public function affichageRetraite()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT CIN, Nom, Prenom, Sexe, codeservice, date_entre, code_grade, if ( LENGTH(`date_entre`)=10,(YEAR(CURDATE()) - YEAR(`date_entre`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_entre`), '-', DAY(`date_entre`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_entre,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as anneservice, if ( LENGTH(`date_naissance`)=10,(YEAR(CURDATE()) - YEAR(`date_naissance`) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(`date_naissance`), '-', DAY(`date_naissance`)) ,'%Y-%c-%e') > CURDATE(), 1, 0)),(YEAR(CURDATE()) - YEAR(CONCAT(date_naissance,'-','01','-','01')) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', '01', '-', '01') ,'%Y-%c-%e') > CURDATE(), 1, 0))) as age FROM personnel, grade, service WHERE (personnel.service_id = service.id) AND (personnel.grade_id = grade.id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

 
    }
    /*
    public function findOneBySomeField($value): ?Personnel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

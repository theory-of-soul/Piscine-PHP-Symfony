<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{

    public function createTable() {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = 'CREATE TABLE IF NOT EXISTS Users
        (id INT AUTO_INCREMENT NOT NULL,
        username VARCHAR(255) NOT NULL UNIQUE,
        name VARCHAR(255),
        email VARCHAR(255) NOT NULL UNIQUE,
        enable BIT NOT NULL,
        birthday DATETIME,
        address LONGTEXT,
        PRIMARY KEY(id))
        DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        var_dump($stmt->fetchAll());die;
    }
}
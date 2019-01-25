<?php

namespace App\Unit\ex00Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Configuration;

class ex00Controller extends AbstractController
{
    /**
     * @Route("/table")
     */
    public function showTablePage(Request $request)
    {
        $error = false;

        if ($request->query->get('create') == 'true') {
            $statement = $this->createTable();
            $error = $statement->errorCode();
        }

        return $this->render('@ex00/table.html.twig', [
            'error' => $error
        ]);
    }

    private function createTable()
    {
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

        $connectionOptions = array(
            'dbname' => "ex00",
            'user' => "root",
            'password' => "password",
            'host' => "localhost",
            'driver' => 'pdo_mysql');

        $config = new \Doctrine\ORM\Configuration;

        $config->setProxyDir('proxy');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(true);

        $driverImpl = $config->newDefaultAnnotationDriver(__DIR__);
        $config->setMetadataDriverImpl($driverImpl);

        $entityManager = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

        $connection = $entityManager->getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();

        return $statement;
    }
}
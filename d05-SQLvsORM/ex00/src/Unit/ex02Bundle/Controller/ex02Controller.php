<?php

namespace App\Unit\ex02Bundle\Controller;

use App\Entity\Users;
use App\Unit\ex02Bundle\Form\UserType;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ex02Controller extends AbstractController
{
    /**
     * @Route("/ex02")
     */
    public function show(Request $request, Connection $connection)
    {
        $info = 'Status message will be here...';

        $form = $this->createForm(UserType::class, new Users());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            if (
                $this->checkUniqueEmail($connection, $user->getEmail()) &&
                $this->checkUniqueUsername($connection, $user->getUsername())
            ) {
                $this->insertTable($connection, $user);
                $info = 'It was saved in db';
            } else {
                $info = 'Username or email is not unique';
            }
        }

        return $this->render('@ex03/form.html.twig', [
            'form' => $form->createView(),
            'info' => $info,
            'users' => $connection->fetchAll('SELECT * FROM users')
        ]);
    }

    protected function checkUniqueEmail(Connection $connection, string $value) {
        $count = $connection->executeUpdate('SELECT id FROM users WHERE email = ?', array($value));
        return $count == 0;
    }

    protected function checkUniqueUsername(Connection $connection, string $value) {
        $count = $connection->executeUpdate('SELECT id FROM users WHERE username = ?', array($value));
        return $count == 0;
    }

    protected function insertTable(Connection $connection, Users $user) {
        $connection->insert('users', array(
            'username' => $user->getUsername(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'enable' => $user->getEnable(),
            'birthday' => $user->getBirthday()->format("Y-m-d H:i:s")
        ));
    }

}
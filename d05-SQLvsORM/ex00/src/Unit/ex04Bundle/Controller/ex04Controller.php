<?php

namespace App\Unit\ex04Bundle\Controller;

use App\Entity\UserEx04;
use App\Unit\ex04Bundle\Form\UserType;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ex04Controller extends AbstractController
{
    /**
     * @Route("/ex04", name="ex04")
     */
    public function show(Request $request, Connection $connection)
    {
        $info = 'Status message will be here...';

        $form = $this->createForm(UserType::class, new UserEx04());
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $this->insertTable($connection, $user);
        }

        $message = $request->query->get('message');
        if (isset($message)) {
            $info = $message;
        }

        return $this->render('@ex04/form.html.twig', [
            'form' => $form->createView(),
            'info' => $info,
            'users' => $connection->fetchAll('SELECT * FROM user_ex04')
        ]);
    }

    /**
     * @Route("/user/delete/{id}")
     */
    public function deleteRow($id, Connection $connection, Request $request)
    {
        $message = 'error';
        $stmt = $connection->prepare('SELECT id FROM user_ex04 WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() !== 0) {
            $connection->delete('user_ex04', array('id' => $id));
            $message = "success";
        }

        return $this->redirectToRoute('ex04', ['message' => $message]);
    }

    protected function insertTable(Connection $connection, UserEx04 $user) {
        $connection->insert('user_ex04', array(
            'username' => $user->getUsername(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'enable' => (int)$user->getEnable(),
            'birthday' => $user->getBirthday()->format("Y-m-d H:i:s")
        ));
    }
}
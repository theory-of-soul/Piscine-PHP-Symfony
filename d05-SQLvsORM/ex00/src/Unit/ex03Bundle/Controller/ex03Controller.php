<?php

namespace App\Unit\ex03Bundle\Controller;

use App\Entity\Users;
use App\Unit\ex03Bundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ex03Controller extends AbstractController
{
    /**
     * @Route("/ex03")
     */
    public function show(Request $request)
    {
        $info = 'Status message will be here...';

        $form = $this->createForm(UserType::class, new Users());
        $form->handleRequest($request);

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Users::class);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            if (
                $repository->checkUniqueEmail($user->getEmail()) &&
                $repository->checkUniqueUsername($user->getUsername())
            ) {
                $entityManager->persist($user);
                $entityManager->flush();
                $info = 'It was saved in db';
            } else {
                $info = 'Username or email is not unique';
            }
        }

        return $this->render('@ex03/form.html.twig', [
            'form' => $form->createView(),
            'info' => $info,
            'users' => $repository->findAll()
        ]);
    }
}
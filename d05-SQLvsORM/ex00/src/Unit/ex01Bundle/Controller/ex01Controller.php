<?php

namespace App\Unit\ex01Bundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ex01Controller extends AbstractController
{
    private $migrationWasCreated = false;

    /**
     * @Route("/ex01")
     */
    public function showTablePage(Request $request, KernelInterface $kernel, LoggerInterface $logger)
    {
        $content = '';

        if ($request->query->get('create') == 'true') {
            $application = new Application($kernel);
            $application->setAutoExit(false);

            if (!$this->migrationWasCreated) {
                $makeMigrationInput = new ArrayInput(['command' => 'make:migration']);
                $application->run($makeMigrationInput);
                $this->migrationWasCreated = true;
            }

            $migrationMigrateInput = new ArrayInput([
                'command' => 'doctrine:migrations:migrate',
                '-q' => null
            ]);
            $migrationMigrateOutput = new BufferedOutput();

            $application->run($migrationMigrateInput, $migrationMigrateOutput);

            $content = $migrationMigrateOutput->fetch();

            $logger->info('here will content', array($content));
        }

        return $this->render('@ex01/table.html.twig', [
            'content' => $content
        ]);
    }
}
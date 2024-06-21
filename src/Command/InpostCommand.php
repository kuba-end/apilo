<?php

declare(strict_types=1);

namespace App\Command;

use App\Factory\InpostShipXClientFactory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:inpost-points',
    description: 'Calculate loan fee',
    hidden: false,
)]
class InpostCommand extends Command
{
    public function __construct(
        public readonly InpostShipXClientFactory $clientFactory
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        parent::configure();
        $this->setDescription('Allows calculate loan fee for given amount and term');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        //sprawdz czy dependency injection folder jest potrzebny
        $isProduction = $input->getOption('env');
        $client = $this->clientFactory->create($isProduction);
        dd($client);

        return self::SUCCESS;
    }
}

<?php

declare(strict_types=1);

namespace App\Command;

use App\Factory\InpostShipXClientFactory;
use App\Service\PointTransformer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[AsCommand(
    name: 'app:inpost-points',
    description: 'Calculate loan fee',
    hidden: false,
)]
class InpostCommand extends Command
{
    public function __construct(
        public readonly InpostShipXClientFactory $clientFactory,
        public readonly PointTransformer $transformer,
        public readonly SerializerInterface $serializer
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        parent::configure();
        $this->setDescription('Allows calculate loan fee for given amount and term');
        $this->addArgument('city', InputArgument::REQUIRED,'Provide city to obtain parcel lockers');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $city = $input->getArgument('city');
        $client = $this->clientFactory->create();
        $response = $client->getPointsByCity($city, []);
        $jsonData = $response->getBody()->getContents();
        $pointsDTOs = $this->transformer->transformFromJson($jsonData);
        if ([] === $pointsDTOs) {
            $output->writeln('Points not found. Make sure city name you provide is correct');

            return self::FAILURE;
        }
        dump($pointsDTOs);

        return self::SUCCESS;
    }
}

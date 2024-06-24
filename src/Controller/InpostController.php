<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\QueryPointDTO;
use App\Factory\InpostShipXClientFactory;
use App\Service\CityTransformatorChain;
use App\Service\PointTransformer;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class InpostController extends AbstractController
{
    public function __construct(
        public readonly InpostShipXClientFactory $clientFactory,
        public readonly PointTransformer $transformer,
        public readonly CityTransformatorChain $cityTransformatorChain
    ) {

    }

    /**
     * @throws JsonException
     */
    #[Route('/api/inpost/points', methods: ['POST'], format: 'json')]
    public function getInpostPoints(
        #[MapRequestPayload] QueryPointDTO $queryPointDTO
    ): JsonResponse
    {
        $client = $this->clientFactory->create();
        $upperCaseCity = $this->cityTransformatorChain->validate($queryPointDTO->getCity());
        $queryPointDTO->setCity($upperCaseCity);
        $response = $client->getPointsByCity($queryPointDTO->getCity(), ['post_code' => $queryPointDTO->getPostalCode()]);
        $jsonData = $response->getBody()->getContents();
        $pointsDTOs = $this->transformer->transformFromJson($jsonData);

        if ([] === $pointsDTOs) {
            throw new JsonException('Points not found. Make sure city name you provide is correct');
        }

        return new JsonResponse($pointsDTOs);
    }
}

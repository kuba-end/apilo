<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\PointDTO;
use Symfony\Component\Serializer\SerializerInterface;

class PointTransformer
{
    public function __construct(private readonly SerializerInterface $serializer)
    {}

    /**  @return PointDTO[] */
    public function transformFromJson(string $jsonData): array
    {
        $data = json_decode($jsonData, true);
        $items = $data['items'] ?? [];
        $points = [];
        foreach ($items as $item) {
            $points[] = $this->serializer->deserialize(json_encode($item), 'App\DTO\PointDTO', 'json');
        }

        return $points;
    }
}

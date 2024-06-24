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
        $meta = $data['meta'] ?? [];
        $points = [];

        foreach ($items as $item) {
            /** @var PointDTO $pointDTO */
            $pointDTO = $this->serializer->deserialize(json_encode($item), PointDTO::class, 'json');
            $pointDTO->setCount($meta['count']);
            $pointDTO->setPage($meta['page']);
            $pointDTO->setTotalPages($meta['total_pages']);

            $points[] = $pointDTO;
        }

        return $points;
    }
}

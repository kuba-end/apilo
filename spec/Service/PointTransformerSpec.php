<?php

namespace spec\App\Service;

use App\DTO\PointDTO;
use App\Service\PointTransformer;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Serializer\SerializerInterface;

class PointTransformerSpec extends ObjectBehavior
{
    public function let(SerializerInterface $serializer)
    {
        $this->beConstructedWith($serializer);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(PointTransformer::class);
    }

    function it_transforms_json_into_point_dtos(SerializerInterface $serializer, PointDTO $pointDTO)
    {
        $jsonData = json_encode([
            'items' => [
                ['id' => 1, 'name' => 'Point 1'],
                ['id' => 2, 'name' => 'Point 2']
            ],
            'meta' => [
                'count' => 2,
                'page' => 1,
                'total_pages' => 1
            ]
        ]);

        $serializer->deserialize(json_encode(['id' => 1, 'name' => 'Point 1']), PointDTO::class, 'json')
            ->willReturn($pointDTO);
        $serializer->deserialize(json_encode(['id' => 2, 'name' => 'Point 2']), PointDTO::class, 'json')
            ->willReturn(clone $pointDTO);

        $pointDTO->setCount(2)->shouldBeCalled();
        $pointDTO->setPage(1)->shouldBeCalled();
        $pointDTO->setTotalPages(1)->shouldBeCalled();

        $this->transformFromJson($jsonData)->shouldHaveCount(2);
    }

    function it_returns_empty_array_for_empty_json()
    {
        $jsonData = json_encode([]);

        $this->transformFromJson($jsonData)->shouldReturn([]);
    }

    function it_handles_json_without_items_and_meta()
    {
        $jsonData = json_encode(['data' => 'no relevant fields']);

        $this->transformFromJson($jsonData)->shouldReturn([]);
    }
}

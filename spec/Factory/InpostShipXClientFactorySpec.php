<?php

declare(strict_types=1);

namespace spec\App\Factory;

use App\Api\Client;
use App\Factory\InpostShipXClientFactory;
use PhpSpec\ObjectBehavior;

class InpostShipXClientFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InpostShipXClientFactory::class);

    }

    public function it_creates_a_client()
    {
        $client = $this->create(true, ['password' => 'apilo']);
        $client->shouldBeAnInstanceOf(Client::class);
        $client->baseUrl->shouldReturn('https://api-shipx-pl.easypack24.net/v1/');
    }
}
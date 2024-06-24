<?php

declare(strict_types=1);

namespace App\Factory;

use App\Api\Client;
use App\Model\InpostClientInterface;
use GuzzleHttp\Client as HttpClient;

class InpostShipXClientFactory
{
    public function create(bool $isProduction = true, array $auth = null): InpostClientInterface
    {
        $client = new Client();
        $client->setBaseUrl($isProduction);
        $client->setHttpClient(new HttpClient);
        if (null !== $auth) {
            $client->setAuth($auth);
        }

        return $client;
    }
}

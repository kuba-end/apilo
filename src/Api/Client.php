<?php

declare(strict_types=1);

namespace App\Api;

use App\Model\InpostClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client as HttpClient;

class Client implements InpostClientInterface
{
    public HttpClient $httpClient;
    public string $baseUrl;
    public int $organizationId;
    public string $token;

    public function setAuth(?array $auth): void
    {
        $this->organizationId = $auth['companyId'];
        $this->token = $auth['password'];
    }

    public function setBaseUrl(bool $isProduction): void
    {
        if ($isProduction) {
            $this->baseUrl = 'https://api-shipx-pl.easypack24.net/v1/';
        } else {
            $this->baseUrl = 'https://sandbox-api-shipx-pl.easypack24.net/v1/';
        }
    }

    public function setHttpClient(HttpClient $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function getPoints(array $options): ResponseInterface
    {
        // TODO: Implement getPoints() method.
    }
}

<?php

declare(strict_types=1);

namespace App\Api;

use App\Model\InpostClientInterface;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client as HttpClient;

class Client implements InpostClientInterface
{
    public const PER_PAGE = 10;
    public const POINT_TYPE = 'parcel_locker';
    public HttpClient $httpClient;
    public string $baseUrl;
    public string $token;

    public function setAuth(?array $auth): void
    {
        $this->token = $auth['password'];
    }

    public function setBaseUrl(bool $isProduction): void
    {
        if ($isProduction) {
            $this->baseUrl = 'https://api-shipx-pl.easypack24.net/v1/';
        } else {
            $this->baseUrl = 'https://sandbox-api-shipx-pl.easypack24.net/v1/points?city=Kozy';
        }
    }

    public function setHttpClient(HttpClient $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function getPointsByCity(string $city, array $options = []): ResponseInterface
    {
        $requestData = \array_merge(
            [
                'city' => $city,
                'post_code' => isset($options['post_code']) ?: null,
                'per_page' => self::PER_PAGE,
                'type' => self::POINT_TYPE
            ],
            $options
        );

        return $this->getResponse('points', $requestData);
    }

    private function getResponse(string $url = '', array $requestData = [], bool $authorization = false): ResponseInterface
    {
        $fullUrl = $this->baseUrl . $url;
        $options = [
            'query' => $requestData,
            'verify' => true,
        ];

        if ($authorization) {
            $options['headers'] = $this->getAuthorization();
        }

        try {
            $response = $this->httpClient->get($fullUrl, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return $response;
    }

    private function getAuthorization(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->getToken(),
        ];
    }

    private function getToken(): string
    {
        return $this->token;
    }
}

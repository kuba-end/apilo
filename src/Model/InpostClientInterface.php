<?php

namespace App\Model;

use Psr\Http\Message\ResponseInterface;

interface InpostClientInterface
{
    public function getPointsByCity(string $city, array $options): ResponseInterface;
}
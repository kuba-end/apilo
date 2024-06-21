<?php

namespace App\Model;

use Psr\Http\Message\ResponseInterface;

interface InpostClientInterface
{
    public function getPoints(array $options): ResponseInterface;
}
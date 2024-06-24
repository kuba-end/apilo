<?php

namespace App\Service;

interface CityValidatorInterface
{
    public function validate(string $city): string;
}
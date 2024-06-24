<?php

declare(strict_types=1);

namespace App\Service;

class SinglePhraseCityValidator implements CityValidatorInterface
{

    public function validate(string $city): string
    {
        if (!preg_match('/[\s-]/', $city)) {
            return mb_ucfirst(mb_strtolower($city));
        }

        return '';
    }
}

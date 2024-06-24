<?php

declare(strict_types=1);

namespace App\Service;

class DashPhraseCityValidator implements CityValidatorInterface
{

    public function validate(string $city): string
    {
        if (preg_match('/[\-]/', $city)) {
            $parts = explode('-', $city);

            $capitalizedWords = array_map(function($part) {
                return mb_ucfirst(mb_strtolower($part));
            }, $parts);

            // fun fact point POP-JSN2 has name without dash "Bielsko Biała"
            return implode('-', $capitalizedWords);
        }

        return '';
    }
}

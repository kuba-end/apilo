<?php

declare(strict_types=1);

namespace App\Service;

class DoublePhraseCityValidator implements CityValidatorInterface
{

    public function validate(string $city): string
    {
        if (preg_match('/[\s]/', $city)) {
            $parts = explode(' ', $city);
            if (2 === count($parts)) {
                $capitalizedWords = array_map(function($part) {
                    return mb_ucfirst(mb_strtolower($part));
                }, $parts);

                return implode(' ', $capitalizedWords);
            }
        }

        return '';
    }
}

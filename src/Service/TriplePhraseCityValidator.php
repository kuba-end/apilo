<?php

declare(strict_types=1);

namespace App\Service;

class TriplePhraseCityValidator implements CityValidatorInterface
{
    private const PREPOSITION =['nad'];
    public function validate(string $city): string
    {
        if (preg_match('/[\s]/', $city)) {
            $parts = explode(' ', $city);
            if (3 <= count($parts)){

                $capitalizedWords = array_map(function($part) {
                    $lowercasePart = mb_strtolower($part);
                    if (!in_array($lowercasePart, self::PREPOSITION)){
                        return mb_ucfirst($lowercasePart);
                    }

                    return $lowercasePart;
                }, $parts);

                return implode(' ', $capitalizedWords);
            }
        }

        return '';
    }
}

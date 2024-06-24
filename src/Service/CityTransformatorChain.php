<?php

declare(strict_types=1);

namespace App\Service;

class CityTransformatorChain
{
    public const TAG = 'app.transport.city_uppercase_transformer';

    /** @var iterable|CityValidatorInterface[] */
    private iterable $validators;

    public function __construct(iterable $validators)
    {
        $this->validators = $validators;
    }

    public function validate(string $city): string
    {
        foreach ($this->validators as $validator) {
            $transformedCity = $validator->validate($city);
            if (!empty($transformedCity)) {
                return $transformedCity;
            }
        }

        return $city;
    }
}

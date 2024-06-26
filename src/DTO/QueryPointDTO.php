<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class QueryPointDTO
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(min: 3, max: 64, )]
        private string $city,

        /**
         * @Assert\Optional
         * @Assert\Regex(
         *     pattern="/^\d{2}-\d{3}$/",
         *     message="Invalid postal code format"
         * )
         */
        private ?string $postalCode,
    ) {
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
}

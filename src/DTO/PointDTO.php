<?php

declare(strict_types=1);

namespace App\DTO;

use JsonSerializable;

class PointDTO implements JsonSerializable
{
    public int $count;
    public int $page;
    public int $totalPages;
    public string $name;
    public array $addressDetails;
    public array $address;

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): void
    {
        $this->totalPages = $totalPages;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddressDetails(): array
    {
        return $this->addressDetails;
    }

    public function setAddressDetails(array $addressDetails): void
    {
        $this->addressDetails = $addressDetails;
    }

    public function getAddress(): array
    {
        return $this->address;
    }

    public function setAddress(array $address): void
    {
        $this->address = $address;
    }


    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'line1' => $this->address['line1'],
            'line2' => $this->address['line2'],
        ];
    }

}

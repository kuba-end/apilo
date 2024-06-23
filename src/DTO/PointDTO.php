<?php

declare(strict_types=1);

namespace App\DTO;

class PointDTO
{
    public string $name;
    public array $type;
    public string $status;
    public array $location;
    public ?array $locationType;
    public ?array $locationDate;
    public string $locationDescription;
    public ?string $distance;
    public string $openingHours;
    public array $address;
    public array $addressDetails;
    public ?string $phoneNumber;
    public string $paymentoPointDescription;
    public array $functions;
    public int $partnerId;
    public bool $isNext;
    public bool $paymentAvailable;
    public array $paymentType;
    public string $virtual;
    public ?array $recommendedLowInterestBoxMachinesList;
    public ?bool $apmDoubled;
    public bool $isOpenAlways;
    public array $operatingHoursExtended;
    public ?string $agency;
    public string $imageUrl;
    public bool $easyAccessZone;
    public ?string $airIndexLevel;
    public ?string $physicalTypeMapped;
    public ?string $physicalTypeDescription;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): array
    {
        return $this->type;
    }

    public function setType(array $type): void
    {
        $this->type = $type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $location): void
    {
        $this->location = $location;
    }

    public function getLocationType(): ?array
    {
        return $this->locationType;
    }

    public function setLocationType(?array $locationType): void
    {
        $this->locationType = $locationType;
    }

    public function getLocationDate(): ?array
    {
        return $this->locationDate;
    }

    public function setLocationDate(?array $locationDate): void
    {
        $this->locationDate = $locationDate;
    }

    public function getLocationDescription(): string
    {
        return $this->locationDescription;
    }

    public function setLocationDescription(string $locationDescription): void
    {
        $this->locationDescription = $locationDescription;
    }

    public function getDistance(): ?string
    {
        return $this->distance;
    }

    public function setDistance(?string $distance): void
    {
        $this->distance = $distance;
    }

    public function getOpeningHours(): string
    {
        return $this->openingHours;
    }

    public function setOpeningHours(string $openingHours): void
    {
        $this->openingHours = $openingHours;
    }

    public function getAddress(): array
    {
        return $this->address;
    }

    public function setAddress(array $address): void
    {
        $this->address = $address;
    }

    public function getAddressDetails(): array
    {
        return $this->addressDetails;
    }

    public function setAddressDetails(array $addressDetails): void
    {
        $this->addressDetails = $addressDetails;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPaymentoPointDescription(): string
    {
        return $this->paymentoPointDescription;
    }

    public function setPaymentoPointDescription(string $paymentoPointDescription): void
    {
        $this->paymentoPointDescription = $paymentoPointDescription;
    }

    public function getFunctions(): array
    {
        return $this->functions;
    }

    public function setFunctions(array $functions): void
    {
        $this->functions = $functions;
    }

    public function getPartnerId(): int
    {
        return $this->partnerId;
    }

    public function setPartnerId(int $partnerId): void
    {
        $this->partnerId = $partnerId;
    }

    public function isNext(): bool
    {
        return $this->isNext;
    }

    public function setIsNext(bool $isNext): void
    {
        $this->isNext = $isNext;
    }

    public function isPaymentAvailable(): bool
    {
        return $this->paymentAvailable;
    }

    public function setPaymentAvailable(bool $paymentAvailable): void
    {
        $this->paymentAvailable = $paymentAvailable;
    }

    public function getPaymentType(): array
    {
        return $this->paymentType;
    }

    public function setPaymentType(array $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    public function getVirtual(): string
    {
        return $this->virtual;
    }

    public function setVirtual(string $virtual): void
    {
        $this->virtual = $virtual;
    }

    public function getRecommendedLowInterestBoxMachinesList(): ?array
    {
        return $this->recommendedLowInterestBoxMachinesList;
    }

    public function setRecommendedLowInterestBoxMachinesList(?array $recommendedLowInterestBoxMachinesList): void
    {
        $this->recommendedLowInterestBoxMachinesList = $recommendedLowInterestBoxMachinesList;
    }

    public function isApmDoubled(): ?bool
    {
        return $this->apmDoubled;
    }

    public function setApmDoubled(?bool $apmDoubled): void
    {
        $this->apmDoubled = $apmDoubled;
    }

    public function isOpenAlways(): bool
    {
        return $this->isOpenAlways;
    }

    public function setIsOpenAlways(bool $isOpenAlways): void
    {
        $this->isOpenAlways = $isOpenAlways;
    }

    public function getOperatingHoursExtended(): array
    {
        return $this->operatingHoursExtended;
    }

    public function setOperatingHoursExtended(array $operatingHoursExtended): void
    {
        $this->operatingHoursExtended = $operatingHoursExtended;
    }

    public function getAgency(): ?string
    {
        return $this->agency;
    }

    public function setAgency(?string $agency): void
    {
        $this->agency = $agency;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function isEasyAccessZone(): bool
    {
        return $this->easyAccessZone;
    }

    public function setEasyAccessZone(bool $easyAccessZone): void
    {
        $this->easyAccessZone = $easyAccessZone;
    }

    public function getAirIndexLevel(): ?string
    {
        return $this->airIndexLevel;
    }

    public function setAirIndexLevel(?string $airIndexLevel): void
    {
        $this->airIndexLevel = $airIndexLevel;
    }

    public function getPhysicalTypeMapped(): ?string
    {
        return $this->physicalTypeMapped;
    }

    public function setPhysicalTypeMapped(?string $physicalTypeMapped): void
    {
        $this->physicalTypeMapped = $physicalTypeMapped;
    }

    public function getPhysicalTypeD(): ?string
    {
        return $this->physicalTypeD;
    }

    public function setPhysicalTypeD(?string $physicalTypeD): void
    {
        $this->physicalTypeD = $physicalTypeD;
    }
}

<?php

namespace App\Services;

class TarrifB implements TariffInterface
{
    public function __construct(protected $data)
    {}

    public function calculateCost(int $consumption) : float
    {
        if ($consumption <= $this->data['includedKwh']) {
            return $this->data['baseCost']; 
        }

        $addConsumption = ($consumption - $this->data['includedKwh']);
        return $this->data['baseCost'] + (($addConsumption * $this->data['additionalKwhCost'] / 100));
    }
}
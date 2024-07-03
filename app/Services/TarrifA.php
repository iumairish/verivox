<?php

namespace App\Services;

class TarrifA implements TariffInterface
{
    public function __construct(protected $data)
    {}

    public function calculateCost(int $consumption) : float
    {
        return ($this->data['baseCost'] * 12) + (($consumption * $this->data['additionalKwhCost']) / 100);
    }
}
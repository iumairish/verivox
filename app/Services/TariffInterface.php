<?php

namespace App\Services;

interface TariffInterface {
    public function calculateCost(int $yearlyConsumption): float;
}
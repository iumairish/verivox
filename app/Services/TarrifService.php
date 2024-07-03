<?php

namespace App\Services;

use App\Repositories\TarrifRepositoryInterface;
use App\Services\TarrifA;
use App\Services\TarrifB;
use InvalidArgumentException;

class TarrifService
{
    public function __construct(
        protected TarrifRepositoryInterface $tarrifRepository
    ) {}

    public function getTarrif(int $type, $data) 
    {
        switch ($type) {
            case 1:
                return new TarrifA($data);
            case 2:
                return new TarrifB($data);
            default:
                throw new InvalidArgumentException("Invalid product type: $type");
        }
    }

    public function calculateAnnualCost(int $consumption)
    {
        $data = $this->tarrifRepository->all();
        $result = collect($data)->map(function($item) use($consumption) {
            $tarrif = $this->getTarrif($item['type'], $item);
            $annualCost = $tarrif->calculateCost($consumption);
            return [
                'name'          =>  $item['name'],
                'annualCost'    =>  $annualCost
            ];
        });

        return $result;
    }
}
<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Repositories\TarrifRepositoryInterface;
use App\Services\TarrifService;
use App\Services\TarrifA;
use App\Services\TarrifB;

class TarrifServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_calculate_annual_cost_for_3500()
    {
        $consumption = 3500;

        $data = [
            [
                "name"              =>  "Product A",
                "type"              =>  1,
                "baseCost"          =>  5,
                "includedKwh"       =>  0,
                "additionalKwhCost" =>  22
            ],
            [
                "name"              =>  "Product B",
                "type"              =>  2,
                "baseCost"          =>  800,
                "includedKwh"       =>  4000,
                "additionalKwhCost" =>  30
            ],
        ];

        $mockRepository = Mockery::mock(TarrifRepositoryInterface::class);
        $mockRepository->shouldReceive('all')->andReturn($data);

        $mockTarrifA = Mockery::mock(TarrifA::class);
        $mockTarrifA->shouldReceive('calculateCost')->with($consumption)->andReturn(830);

        $mockTarrifB = Mockery::mock(TarrifB::class);
        $mockTarrifB->shouldReceive('calculateCost')->with($consumption)->andReturn(800);

        $service = new TarrifService($mockRepository);

        $service = Mockery::mock($service)->makePartial();
        $service->shouldReceive('getTarrif')->with(1, $data[0])->andReturn($mockTarrifA);
        $service->shouldReceive('getTarrif')->with(2, $data[1])->andReturn($mockTarrifB);

        $result = $service->calculateAnnualCost($consumption);

        $expected = collect([
            ['name' => 'Product A', 'annualCost' => 830.0],
            ['name' => 'Product B', 'annualCost' => 800.0],
        ]);

        $this->assertEquals($expected, $result);
    }

    public function test_calculate_annual_cost_for_4500()
    {
        $consumption = 4500;

        $data = [
            [
                "name"              =>  "Product A",
                "type"              =>  1,
                "baseCost"          =>  5,
                "includedKwh"       =>  0,
                "additionalKwhCost" =>  22
            ],
            [
                "name"              =>  "Product B",
                "type"              =>  2,
                "baseCost"          =>  800,
                "includedKwh"       =>  4000,
                "additionalKwhCost" =>  30
            ],
        ];

        $mockRepository = Mockery::mock(TarrifRepositoryInterface::class);
        $mockRepository->shouldReceive('all')->andReturn($data);

        $mockTarrifA = Mockery::mock(TarrifA::class);
        $mockTarrifA->shouldReceive('calculateCost')->with($consumption)->andReturn(1050);

        $mockTarrifB = Mockery::mock(TarrifB::class);
        $mockTarrifB->shouldReceive('calculateCost')->with($consumption)->andReturn(950);

        $service = new TarrifService($mockRepository);

        $service = Mockery::mock($service)->makePartial();
        $service->shouldReceive('getTarrif')->with(1, $data[0])->andReturn($mockTarrifA);
        $service->shouldReceive('getTarrif')->with(2, $data[1])->andReturn($mockTarrifB);

        $result = $service->calculateAnnualCost($consumption);

        $expected = collect([
            ['name' => 'Product A', 'annualCost' => 1050.0],
            ['name' => 'Product B', 'annualCost' => 950.0],
        ]);

        $this->assertEquals($expected, $result);
    }
}
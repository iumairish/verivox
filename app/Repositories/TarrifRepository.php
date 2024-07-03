<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tarrif;

class TarrifRepository implements TarrifRepositoryInterface
{

    public function __construct(
        protected Tarrif $tariff
    ) {}

    public function all(): Collection
    {
        return $this->tariff->all();
    }
}
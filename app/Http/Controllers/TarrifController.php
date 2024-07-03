<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompareRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Services\TarrifService;
use Illuminate\Support\Arr;

class TarrifController extends BaseController
{

    public function __construct(
        protected TarrifService $tarrifService,
    ) {}

    public function compareCost(CompareRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $result = $this->tarrifService->calculateAnnualCost($request->get('consumption'));

        $sortedResult = array_values(Arr::sort($result, function (array $value) {
            return $value['annualCost'];
        }));
 
        return response()->json(['total' => count($result), 'data' => $sortedResult], 200);
    }

}

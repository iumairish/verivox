<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function test(): JsonResponse
    {
        return response()->json(['message' => 'working'], 200);
    }

}

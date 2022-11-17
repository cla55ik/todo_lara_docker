<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @param mixed $data
     * @return JsonResponse
     */
    private function jsonResponse(mixed $data): JsonResponse
    {
        return response()->json($data, 200, [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}

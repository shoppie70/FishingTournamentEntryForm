<?php

namespace Modules\Front\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserReservationController extends Controller
{
    public function reservation(): JsonResponse
    {
        return response()->json(['message' => 'Reservation endpoint']);
    }

    public function cancel(): JsonResponse
    {
        return response()->json(['message' => 'Cancel endpoint']);
    }
}

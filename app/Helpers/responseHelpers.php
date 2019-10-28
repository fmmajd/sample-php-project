<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

trait responseHelpers {

  protected function jsonResponse($data, $message = null, $status = 200, $success = true, $userMessage = null): JsonResponse
  {
    if(is_null($data)) {
        $data = [];
    }

    if (is_null($message)) {
        $message = '';
    }
    
    $success = ((int)($status/100)) === 2;

    $responseData = [
        'success' => $success,
        'message' => $message,
        'data' => $data
    ];

    return response()->json($responseData)->setStatusCode($status);
  }
}

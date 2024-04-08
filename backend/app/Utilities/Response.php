<?php

namespace App\Utilities;

use App\Utilities\Utility;

class Response extends Utility {

    /**
     *
     * @param $result: result of operation
     * @param string $message: message of return
     * @param int $count: count of element of returned. Default is null.
     * @param int $total: total of element can be returned. Default is null.
     * @param int $code: status code of http Response. Default is 200.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function send_response($result, string $message, int $count = null, int $total = null, int $code = 200){
        return response()->json([
            'data' => $result,
            'message' => $message,
            'total' => $total,
            'count' => $count
        ], $code);
    }
}

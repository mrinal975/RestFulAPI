<?php

namespace App\Http\Middleware;

use App\Http\ThrotleRequestResponseException;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
class CustomThrotleRequest extends ThrottleRequests
{
    use ApiResponser;
    protected function buildException($key, $maxAttempts)
    {
        $customresponse = $this->errorResponse('Too many Attempt',429);
        $retryAfter = $this->getTimeUntilNextRetry($key);

        $headers = $this->getHeaders(
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );

        return new ThrottleRequestsException(
            $customresponse, null, $headers
        );
    }

}

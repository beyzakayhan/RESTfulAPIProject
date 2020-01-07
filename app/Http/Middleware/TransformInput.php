<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\ValidationException;

class TransformInput
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed                    $transformer
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $transformer)
    {
        $transformedInput = [];
        foreach ($request->all() as $input => $value) {
            $transformedInput[$transformer::originalAttribute($input)] = $value;
        }

        $request->replace($transformedInput);

        $response = $next($request);

        if (isset($response->exception) && $response->exception instanceof ValidationException) {
            $data = $response->getData();

            $transformErrors = [];
            foreach ($data->error as $key => $error) {
                $transformedField = $transformer::transformedAttribute($key);

                $transformedErrors[$transformedField] = str_replace($key, $transformedField, $error);
            }
            $data->error = $transformedErrors;
            $response->setData($data);
        }

        return $response;
    }
}

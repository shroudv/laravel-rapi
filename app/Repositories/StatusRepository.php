<?php

namespace App\Repositories;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class StatusRepository
{
    public static function response($data = null, $message = null, $responseCode = 200, $errorCode = null)
    {
        $template = ['data' => $data, 'message' => $message];
        $errorCode ? $template['error'] = $errorCode : null;

        return throw (new HttpResponseException(
            new JsonResponse($template, $responseCode)
        ));
    }

    public static function notFound($dataName)
    {
        $template = ['data' => null, 'message' => $dataName . '_not_exist'];
        return throw (new HttpResponseException(new JsonResponse($template, 404)));
    }
}

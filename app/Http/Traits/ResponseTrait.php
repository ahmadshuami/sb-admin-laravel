<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Session;

trait ResponseTrait 
{
    /*
    |----------------------------------------------------------------------------------------------------------------------------------
    | Response Trait
    | 
    | path: app/Http/Traits/ResponseTrait.php
    |----------------------------------------------------------------------------------------------------------------------------------
    |
    | This trait handles user response alerts.
    |
    | List of methods:
    | 1. alertResponse
    | 2. ajaxResponse

    /**
     * Return response
     * 
     * If user want to use session to flash alert. This method does not using ajax.
     *
     * @param  string $type
     * @param  integer $response_code
     * @param  mixed $message
     *
     * @return  boolean
     */
    public function alertResponse($type, $message, $response_code)
    {
        Session::flash('status', [
            'type'          => $type,
            'message'       => $message,
            'response_code' => $response_code
        ]);

        return true;
    }

    /**
     * Return response if request using ajax.
     *
     * @param  boolean $success
     * @param  mixed $result
     * @param  mixed $message
     * @param  integer $response_code
     *
     * @return  \Illuminate\Http\Response
     */
    public function ajaxResponse($success, $result, $message, $response_code)
    {
        $response = [
            'success'       => $success,
            'result'        => $result,
            'message'       => $message,
            'response_code' => $response_code
        ];

        return response()->json($response);
    }
}

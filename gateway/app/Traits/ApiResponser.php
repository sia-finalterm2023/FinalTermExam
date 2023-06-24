<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{

    public function successResponse($data, $code = Response::HTTP_OK)
    {

        return response($data, $code)->header('Content-Type','application/json');
    }
    
    public function errorResponse($message, $code)
    {
        return response()->json(['MESSAGE' => $message, 'CODE' => $code],$code);
    }
    
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type','application/json');
    }

    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['DATA'=>$data], $code);
    }
}

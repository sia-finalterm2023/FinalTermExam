<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{
  public function successResponse($data, $code = Response::HTTP_OK){
    return response()->json(['DATA' => $data, 'SERVICE' => "books"], $code);
  }

  public function errorResponse($message, $code)
  {

    return response()->json(['MESSAGE' => $message, 'CODE' => $code, 'SERVICE' => "books"], $code);
    
  }
}

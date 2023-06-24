<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser {

  public function successResponse($data, $code = Response::HTTP_OK){
    return response()->json(['DATA' => $data, 'SERVICE' => "authors"], $code);
  }

  public function errorResponse($message, $code)
  {

    return response()->json(['MESSAGE' => $message, 'CODE' => $code, 'SERVICE' => "authors"], $code);
    
  }
}


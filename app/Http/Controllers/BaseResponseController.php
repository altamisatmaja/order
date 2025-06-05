<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseResponseController extends Controller
{
    // inisialiasasi var
    protected string $status = 'success';
    protected int $code = 200;
    protected string $message = "OK";

    // ada 2 base function
    // 1. response sukses
    // 2. response error

    public function responseSuccessed($data = null){
        return response()->json([
            'status' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $data
        ], $this->code); 
        //  $this->code itu adalah 200
    }

    public function responseError($message = 'Terjadi kesalahan', $error = [], $code = 400){
        return response()->json([
            'status' => 'failed', // error, asal jangan success
            'code' => $code,
            'message' => $message,
            'errors' => $error
        ], $code);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseResponseController
{
    // kita bakalan bikin 2 hal, yaitu
    // 1. get -> untuk melihat atau menampilkan seluruh data,
    //           data dari table order
    // 2. post -> untuk menambahkan sebuah data ke dalam table order
    // 3. update
    // 4. delete

    // get
    public function lihat_data()
    {
        // data table order
        $orders = Order::all();

        $this->message = 'List order berhasil didapatkan';

        // return  response()->json() ????? nggak seperti ini!!
        return $this->responseSuccessed($orders);
    }

    // post
    public function tambah_data(Request $request)
    {
        try {
            // 1. memvalidasi inputan dari request
            // 2. memproses requestnya
            // 3. setelah eksekusi requestnya selesai,
            // kirim response, bisa berupa sukses atau gagal

            $validator = Validator::make($request->all(), [
                'reference_number' => 'required|unique:orders'
            ]);

            if ($validator->fails()) {
                return $this->responseError('Validasi gagal', $validator->errors());
            }

            $order = Order::create([
                'reference_number' => $request->reference_number
            ]);

            return $this->responseSuccessed($order);
        } catch (Exception $exception) {
            return $this->responseError('Terjadi kesalahan', $exception->getMessage());
        }
    }

    public function lihat_view(){
        return view('order');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    // read data
    // get() -> select *
    // first() -> select, mengambil data index pertama
    // value() -> select, mengambil data dari sebuah kolom
    // pluck() -> select, mengambil array dari refrensi sebuah kolom

    // WHERE

    public function index()
    {
        $get = DB::table('orders')->get();
        $first = json_encode(DB::table('orders')->first());
        $value = DB::table('orders')->value('reference_number');
        $pluck = DB::table('orders')->pluck('reference_number');

        // mengambil data dengan syarat status nya adalah 1 atau true
        $where = DB::table('orders')
            ->where('status', 1)
            ->get();


        // SELECT * FROM orders
        // WHERE id > 3

        $orWhere = DB::table('orders')
            // ->where('status', 1)
            // ->orWhere('status', 0)
            // ->orWhere('id', 1)
            ->where('id', '>', value: 3)
            ->get();

        // dapatkan semua data yang statusnya adalah 1 atau 0

        $limitWhere = DB::table('orders')->whereBetween('id', [1, 3])->get();

        $insertOrderDetail = DB::table('order_details')->insert([
            'order_id' => 1,
            'deskripsi' => 'Ini deskripsi',
            'nama_produk' => 'Ini produk',
            'harga_produk' => 20000
        ]);

        $updateData = DB::table('order_details')->where('id', 1)
        ->update([
            'deskripsi' => 'Deksripsi yang diubah',
        ]);

        $deleteData =  DB::table('order_details')->where('id', 2)->delete();

        $getDetail = DB::table('order_details')->get();

        // sorting
        // orderBy -> asc desc

        $getOrderByDetail = DB::table('order_details')->orderBy('id', 'desc')->get();

        // pagination
        
        // ->paginate(2);

        // count, sum, avg, max, min
        // menghitung datadari kolom harga_produk
        $count = DB::table('order_details')->count('harga_produk');
        // menghitung banyaknya data -> count

        $sum = DB::table('order_details')->sum('harga_produk');
        // menghitung total nilai

        $avg = DB::table('order_details')->avg('harga_produk');
        // menghitung rata2

        $max = DB::table('order_details')->max('harga_produk');
        // mengambil nilai dengan harga tertingi

        $min = DB::table('order_details')->min('harga_produk');
        // mengambil nilai dengan harga terendah

        $paginate = DB::table('order_details')
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

        $paginateCount = $paginate->sum('harga_produk');

        // SELECT 
        // WHERE
        // ORDER BY
        // LIMIT
        // OFFSET

        return view(
            'query',
            compact(
                'get',
                'first',
                'value',
                'pluck',
                'where',
                'orWhere',
                'limitWhere',
                'insertOrderDetail',
                'getDetail',
                'updateData',
                'deleteData',
                'getOrderByDetail',
                'paginate',
                'sum',
                'avg',
                'count',
                'max',
                'min',
                'paginateCount'
            )
        );
    }
}

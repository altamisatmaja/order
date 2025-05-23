<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class EloquentExampleController extends Controller
{
    public function index()
    {
        // get by id
        $getById = Order::find(1);
        // get all
        $getAll = Order::all();
        // where
        $where = json_encode(Order::where('reference_number',  'ORD-123456')->first());

        //paginate
        $paginate = json_encode(Order::paginate(10));

        //create
        // Order::create([
        //     'status' => 0,
        //     'reference_number' => 'xxxxxx',
        // ]);

        // update
        $order = Order::find(1);
        $order->status = 1;
        $order->save();

        // $joinTable = Order::with('orderDetails')->get();
        // $order1 = Order::where('id', 1);
        // $order1WithJoin = $order1->orderDetails->deskripsi;
        
        // delete
        // $order = Order::findOrFail(2);
        // $order->delete();

        return view(
            'eloquent',
            compact(
                'getById',
                'getAll',
                'where',
                'paginate',
                'joinTable',
                'order1WithJoin'
            )
        );
    }
}

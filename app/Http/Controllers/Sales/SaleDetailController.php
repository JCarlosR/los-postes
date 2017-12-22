<?php

namespace App\Http\Controllers\Sales;

use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleDetailController extends Controller
{
    public function store($id, Request $request)
    {
        // dd($request->all());
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $sale = Sale::find($id);
        $sale_detail = new SaleDetail();
        $sale_detail->sale_id = $sale->id;
        $sale_detail->quantity = $request->input('quantity');
        $sale_detail->product_id = $request->input('product_id');
        $sale_detail->subtotal = $sale_detail->quantity * $sale_detail->product->price;
        $sale_detail->save();


        return back()->with('notification', 'Articulo agregado correctamente.');
    }
}

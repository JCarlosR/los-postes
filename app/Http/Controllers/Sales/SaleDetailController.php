<?php

namespace App\Http\Controllers\Sales;

use App\Product;
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


        $product_id = $request->input('product_id');

        $product = Product::find($product_id);
        //dd($article);
        $product->stock = $product->stock - $request->input('quantity');
        if ($product->stock < 0) {
            return back()->with('notification', 'No hay stock suficiente.');
        }
        else {
            $sale_detail->save();
            $product->save();
            return back()->with('notification', 'Producto agregado correctamente.');
        }
    }
}

<?php

namespace App\Http\Controllers\Production;

use App\FinishedProduct;
use App\FinishedProductDetail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinishedProductDetailController extends Controller
{
    public function store($id, Request $request)
    {
        // dd($request->all());
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $Fproduct = FinishedProduct::find($id);
        $Fproduct_detail = new FinishedProductDetail();
        $Fproduct_detail->finished_product_id = $Fproduct->id;
        $Fproduct_detail->quantity = $request->input('quantity');
        $Fproduct_detail->product_id = $request->input('product_id');
        $Fproduct_detail->save();
        $product_id = $request->input('product_id');

        $product = Product::find($product_id);
        //dd($article);
        $product->stock = $product->stock + $request->input('quantity');
        $product->save();


        return back()->with('notification', 'Producto agregado correctamente.');
    }
}

<?php

namespace App\Http\Controllers\Production;

use App\FinishedProduct;
use App\FinishedProductDetail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinishedProductController extends Controller
{
    public function index()
    {
        $Fproducts = FinishedProduct::all();

        return view('production.finished_product.index')->with(compact('Fproducts'));
    }

    public function create()
    {
        return view('Production.finished_product.create');
    }

    public function store(Request $request)
    {
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $Fproduct = new FinishedProduct();
        $Fproduct->name = $request->input('name');
        $Fproduct->date = $request->input('date');
        $Fproduct->save();
        $id = $Fproduct->id;

        $notification = 'La lista de productos terminados se ha registrado exitosamente. Ahora ingrese los productos terminados';
        return redirect('/productos-terminados/'.$id.'/editar')->with(compact('notification'));
    }

    public function edit($id)
    {
        $products = Product::all();
        $Fproduct = FinishedProduct::find($id);
        $Fproduct_details = FinishedProductDetail::where('finished_product_id', $Fproduct->id)->get();
        return view('Production.finished_product.edit')->with(compact('products','Fproduct','Fproduct_details'));
    }

    public function detail($id)
    {
        $products = Product::all();
        $Fproduct = FinishedProduct::find($id);
        $Fproduct_details = FinishedProductDetail::where('finished_product_id', $Fproduct->id)->get();
        //dd($quotation_details);
        $total = 0;
        foreach ($Fproduct_details as $Fproduct_detail)
            $total = $total + $Fproduct_detail->subtotal;

        return view('production.finished_product.detail')->with(compact('Fproduct','products','Fproduct_details', 'total'));
    }

    public function delete($id)
    {
        $article = FinishedProduct::find($id);
        $article->delete();

        return back()->with('notification', 'La lista de productos terminados se ha eliminado correctamente.');
    }

    public function stock()
    {
        $products = Product::all();
        return view('ventas.product.stock')->with(compact('products'));
    }
}

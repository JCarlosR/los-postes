<?php

namespace App\Http\Controllers\Sales;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('ventas.product.index')->with(compact('products'));
    }

    public function create()
    {
        return view('ventas.product.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:256',
            'price' => 'required'
        ];
        $messages = [
            'name.required' => 'Es indispensable ingresar el nombre del producto.',
            'name.max' => 'El nombre del producto es demasiado extenso.',
            'price.required' => 'Es indispensable ingresar el precio.'
        ];
        $this->validate($request, $rules, $messages);

        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = 0;
        $product->save();

        $notification = 'El producto se ha registrado exitosamente.';
        return redirect('/productos')->with(compact('notification'));
    }

    public function edit($id)
    {
        $product = Product::find($id);


        return view('ventas.product.edit')->with(compact('product'));
    }

    public function update($id, Request $request)
    {

        $rules = [
            'name' => 'required|max:256',
            'price' => 'required'
        ];
        $messages = [
            'name.required' => 'Es indispensable ingresar el nombre del artículo.',
            'name.max' => 'El nombre del artículo es demasiado extenso.',
            'price.required' => 'Es indispensable ingresar el precio.'
        ];
        $this->validate($request, $rules, $messages);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/productos')->with('notification', 'Producto modificado exitosamente.');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('notification', 'El producto se ha eliminado correctamente.');
    }
}

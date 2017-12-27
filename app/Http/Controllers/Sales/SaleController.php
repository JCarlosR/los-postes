<?php

namespace App\Http\Controllers\Sales;

use App\Client;
use App\Product;
use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();

        return view('ventas.sales.index')->with(compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('ventas.sales.create')->with(compact('clients'));
    }

    public function store(Request $request)
    {
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $sale = new Sale();
        $sale->client_id = $request->input('client_id');
        $sale->date = $request->input('date');
        $sale->save();
        $id = $sale->id;

        $notification = 'El documento de venta se ha registrado exitosamente. Ahora ingrese los productos';
        return redirect('/ventas/'.$id.'/editar')->with(compact('notification'));
    }

    public function edit($id)
    {
        $products = Product::all();
        $sale = Sale::find($id);
        $sale_details = SaleDetail::where('sale_id', $sale->id)->get();
        return view('ventas.sales.edit')->with(compact('sale','products','sale_details'));
    }

    public function detail($id)
    {
        $products = Product::all();
        $sale = Sale::find($id);
        $sale_details = SaleDetail::where('sale_id', $sale->id)->get();
        //dd($quotation_details);
        $total = 0;
        $igv = 0;
        $totalIgv = 0;
        foreach ($sale_details as $sale_detail)
            $total = $total + $sale_detail->subtotal;

        $igv = $total*0.18;
        $totalIgv = $total + $igv;

        return view('ventas.sales.detail')->with(compact('sale','products','sale_details', 'total','igv', 'totalIgv'));
    }

    public function delete($id)
    {
        $article = Sale::find($id);
        $article->delete();

        return back()->with('notification', 'La venta se ha eliminado correctamente.');
    }
}

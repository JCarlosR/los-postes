<?php

namespace App\Http\Controllers\Logistics;

use App\Article;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('Logistics.order.index')->with(compact('orders'));
    }

    public function create()
    {
        return view('Logistics.order.create');
    }

    public function store(Request $request)
    {
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $order = new Order();
        $order->name = $request->input('name');
        $order->date = $request->input('date');
        $order->save();
        $id = $order->id;

        $notification = 'La orden de compra se ha registrado exitosamente. Ahora ingrese los articulos';
        return redirect('/orden-compra/'.$id.'/editar')->with(compact('notification'));
    }

    public function edit($id)
    {
        $articles = Article::all();
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', $order->id)->get();
        return view('Logistics.order.edit')->with(compact('order','articles','order_details'));
    }

    public function detail($id)
    {
        $articles = Article::all();
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', $order->id)->get();
        //dd($quotation_details);
        $total = 0;
        foreach ($order_details as $order_detail)
            $total = $total + $order_detail->subtotal;

        return view('Logistics.order.detail')->with(compact('order','articles','order_details', 'total'));
    }

    public function delete($id)
    {
        $article = Order::find($id);
        $article->delete();

        return back()->with('notification', 'La orden de compra se ha eliminado correctamente.');
    }
}

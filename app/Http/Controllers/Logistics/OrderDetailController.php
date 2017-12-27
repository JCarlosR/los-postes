<?php

namespace App\Http\Controllers\Logistics;

use App\Article;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailController extends Controller
{
    public function store($id, Request $request)
    {
        // dd($request->all());
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $order = Order::find($id);
        $order_detail = new OrderDetail();
        $order_detail->order_id = $order->id;
        $order_detail->quantity = $request->input('quantity');
        $order_detail->unit_price = $request->input('unit_price');
        $order_detail->subtotal = $order_detail->quantity * $order_detail->unit_price;
        $order_detail->article_id = $request->input('article_id');
        $order_detail->save();
        $article_id = $request->input('article_id');

        $article = Article::find($article_id);
        //dd($article);
        $article->stock = $article->stock + $request->input('quantity');
        $article->save();


        return back()->with('notification', 'Articulo agregado correctamente.');
    }
}

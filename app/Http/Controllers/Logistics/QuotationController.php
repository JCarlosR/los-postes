<?php

namespace App\Http\Controllers\Logistics;

use App\Article;
use App\Quotation;
use App\QuotationDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::all();

        return view('Logistics.quotation.index')->with(compact('quotations'));
    }

    public function create()
    {
        return view('Logistics.quotation.create');
    }

    public function store(Request $request)
    {
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $quotation = new Quotation();
        $quotation->name = $request->input('name');
        $quotation->phone = $request->input('phone');
        $quotation->date = $request->input('date');
        $quotation->deliver_date = $request->input('deliver_date');
        $quotation->days = $request->input('days');
        $quotation->payment = $request->input('payment');
        $quotation->save();
        $id = $quotation->id;

        $notification = 'La cotización se ha registrado exitosamente. Ahora ingrese los articulos';
        return redirect('/cotizacion/'.$id.'/editar')->with(compact('notification'));
    }

    public function edit($id)
    {
        $articles = Article::all();
        $quotation = Quotation::find($id);
        $quotation_details = QuotationDetail::where('quotation_id', $quotation->id)->get();
        return view('Logistics.quotation.edit')->with(compact('quotation','articles','quotation_details'));
    }

    public function detail($id)
    {
        $articles = Article::all();
        $quotation = Quotation::find($id);
        $quotation_details = QuotationDetail::where('quotation_id', $quotation->id)->get();
        //dd($quotation_details);
        $total = 0;
        foreach ($quotation_details as $quotation_detail)
            $total = $total + $quotation_detail->subtotal;

        return view('Logistics.quotation.detail')->with(compact('quotation','articles','quotation_details', 'total'));
    }

    public function delete($id)
    {
        $article = Quotation::find($id);
        $article->delete();

        return back()->with('notification', 'La cotización se ha eliminado correctamente.');
    }
}

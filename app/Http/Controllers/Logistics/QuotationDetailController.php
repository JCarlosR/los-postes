<?php

namespace App\Http\Controllers\Logistics;

use App\Quotation;
use App\QuotationDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationDetailController extends Controller
{
    public function store($id, Request $request)
    {
        // dd($request->all());
        $rules = [

        ];
        $messages = [

        ];
        $this->validate($request, $rules, $messages);

        $quotation = Quotation::find($id);
        $quotation_detail = new QuotationDetail;
        $quotation_detail->quotation_id = $quotation->id;
        $quotation_detail->quantity = $request->input('quantity');
        $quotation_detail->unit_price = $request->input('unit_price');
        $quotation_detail->subtotal = $quotation_detail->quantity * $quotation_detail->unit_price;
        $quotation_detail->article_id = $request->input('article_id');
        $quotation_detail->save();


        return back()->with('notification', 'Articulo agregado correctamente.');
    }
}

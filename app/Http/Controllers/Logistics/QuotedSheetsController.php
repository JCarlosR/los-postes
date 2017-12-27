<?php

namespace App\Http\Controllers\Logistics;

use App\Article;
use App\QuotedSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class QuotedSheetsController extends Controller
{
    public function index()
    {
        $quotedSheets = QuotedSheet::all();
        return view('Logistics.quoted-sheets.index')->with(compact('quotedSheets'));
    }

    public function create()
    {
        return view('Logistics.quoted-sheets.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'company_name' => 'required|max:256',
            'registration_code' => 'required'
        ];
        $messages = [
            'company_name.required' => 'Es indispensable ingresar el nombre de la empresa.',
            'company_name.max' => 'El nombre de la empresa es demasiado extenso.',
            'registration_code.required' => 'Es indispensable ingresar el código de registro.'
        ];
        $this->validate($request, $rules, $messages);

        $quotedSheet = new QuotedSheet();

        $quotedSheet->registration_code = $request->input('registration_code');
        $quotedSheet->company_name = $request->input('company_name');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;

            $path = public_path('images/quoted-sheet/' . $fileName);

            Image::make($request->file('image'))
                ->save($path);

            $quotedSheet->image = $fileName;
        }
        $quotedSheet->save();

        $notification = 'La hoja cotizada se ha registrado exitosamente.';
        return redirect('/hojas-cotizadas')->with(compact('notification'));
    }

    public function edit($id)
    {
        $quotedSheet = QuotedSheet::find($id);


        return view('Logistics.quoted-sheets.edit')->with(compact('quotedSheet'));
    }

    public function update($id, Request $request)
    {

        $rules = [
            'company_name' => 'required|max:256',
            'registration_code' => 'required'
        ];
        $messages = [
            'company_name.required' => 'Es indispensable ingresar el nombre del artículo.',
            'company_name.max' => 'El nombre del artículo es demasiado extenso.',
            'registration_code.required' => 'Es indispensable ingresar el precio.'
        ];
        $this->validate($request, $rules, $messages);

        $quotedSheet = QuotedSheet::find($id);

        $quotedSheet->registration_code = $request->input('registration_code');
        $quotedSheet->company_name = $request->input('company_name');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $quotedSheet->id . '.' . $extension;

            $path = public_path('images/quoted-sheet/' . $fileName);

            Image::make($request->file('image'))
                ->save($path);

            $quotedSheet->image = $fileName;
        }
        $quotedSheet->save();

        return redirect('/hojas-cotizadas')->with('notification', 'Hoja cotizada modificada exitosamente.');
    }

    public function delete($id)
    {
        $article = QuotedSheet::find($id);
        $article->delete();

        return back()->with('notification', 'El articulo se ha eliminado correctamente.');
    }
}

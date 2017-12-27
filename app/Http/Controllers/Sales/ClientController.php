<?php

namespace App\Http\Controllers\Sales;

use App\Client;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('ventas.client.index')->with(compact('clients'));
    }

    public function create()
    {
        return view('ventas.client.create');
    }

    public function store(Request $request)
    {
        $rules = [
            "dni" => "required_if:type,==,N",
            "name" => "required_if:type,==,N",
            "last_name" => "required_if:type,==,N",
            "business_name" => "required_if:type,==,J",
            "ruc" => "required_if:type,==,J"
        ];
        $messages = [
            'name.required_if' => 'Es indispensable ingresar el nombre del cliente.',
            'dni.required_if' => 'Es indispensable ingresar el dni del cliente.',
            'last_name.required_if' => 'Es indispensable ingresar el apellido del cliente.',
            'business_name.required_if' => 'Es indispensable ingresar la razon social de la empresa    .',
            'ruc.required_if' => 'Es indispensable ingresar el ruc de la empresa.',
        ];
        $this->validate($request, $rules, $messages);

        $client = new Client();

        $client->type = $request->input('type');
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->business_name = $request->input('business_name');
        $client->ruc = $request->input('ruc');
        $client->dni = $request->input('dni');
        $client->phone = $request->input('phone');
        $client->address = $request->input('address');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;

            $path = public_path('images/users/' . $fileName);

            Image::make($request->file('image'))
                ->fit(128, 128)
                ->save($path);

            $client->image = $fileName;
        }
        $client->save();

        $notification = 'El cliente se ha registrado exitosamente.';
        return redirect('/clientes')->with(compact('notification'));
    }

    public function edit($id)
    {
        $client = Client::find($id);


        return view('ventas.client.edit')->with(compact('client'));
    }

    public function update($id, Request $request)
    {

        $rules = [
            "dni" => "required_if:type,==,N",
            "name" => "required_if:type,==,N",
            "last_name" => "required_if:type,==,N",
            "business_name" => "required_if:type,==,J",
            "ruc" => "required_if:type,==,J"
        ];
        $messages = [
            'name.required_if' => 'Es indispensable ingresar el nombre del cliente.',
            'dni.required_if' => 'Es indispensable ingresar el dni del cliente.',
            'last_name.required_if' => 'Es indispensable ingresar el apellido del cliente.',
            'business_name.required_if' => 'Es indispensable ingresar la razon social de la empresa    .',
            'ruc.required_if' => 'Es indispensable ingresar el ruc de la empresa.',
        ];
        $this->validate($request, $rules, $messages);

        $client = Client::find($id);

        $client->type = $request->input('type');
        $client->name = $request->input('name');
        $client->last_name = $request->input('last_name');
        $client->business_name = $request->input('business_name');
        $client->ruc = $request->input('ruc');
        $client->dni = $request->input('dni');
        $client->phone = $request->input('phone');
        $client->address = $request->input('address');
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $client->id . '.' . $extension;

            $path = public_path('images/users/' . $fileName);

            Image::make($request->file('image'))
                ->fit(128, 128)
                ->save($path);

            $client->image = $fileName;
        }
        $client->save();

        return redirect('/clientes')->with('notification', 'Cliente modificado exitosamente.');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();

        return back()->with('notification', 'El cliente se ha eliminado correctamente.');
    }
}

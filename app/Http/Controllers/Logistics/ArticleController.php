<?php

namespace App\Http\Controllers\Logistics;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('Logistics.articles.index')->with(compact('articles'));
    }

    public function create()
    {
        return view('Logistics.articles.create');
    }

    public function store(Request $request)
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

        $article = new Article();

        $article->name = $request->input('name');
        $article->description = $request->input('description');
        $article->price = $request->input('price');
        $article->stock = 0;
        $article->save();

        $notification = 'El artículo se ha registrado exitosamente.';
        return redirect('/articulos')->with(compact('notification'));
    }

    public function edit($id)
    {
        $article = Article::find($id);


        return view('Logistics.articles.edit')->with(compact('article'));
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

        $article = Article::find($id);

        $article->name = $request->input('name');
        $article->description = $request->input('description');
        $article->price = $request->input('price');
        $article->save();




        return redirect('/articulos')->with('notification', 'Artículo modificado exitosamente.');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return back()->with('notification', 'El articulo se ha eliminado correctamente.');
    }

    public function stock()
    {
        $articles = Article::all();
        return view('Logistics.articles.stock')->with(compact('articles'));
    }
}

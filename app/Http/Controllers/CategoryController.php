<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        //retorna la vista donde se mostraran las categorias
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //no se implementa ya que no se requiere mostrar solo una categoria
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //se obtienen los datos de una categoria especifica segun su id
        $category = category::findOrFail($id);
        //se retorna la vista con el formulario para edicion
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Busca una categoria por su id. Si no existe lanza error
        $category = Category::findOrFail($id);
        //se obtiene del formulario de edicion los nuevos datos
        $category->update($request->all());
        //Se retorna la vista index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Elimina una categoria por su id
        Category::destroy($id);
        //Se retorna la vista index
        return redirect()->route('categories.index');
    }
}

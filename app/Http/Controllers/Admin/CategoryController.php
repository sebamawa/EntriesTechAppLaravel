<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//request (validacion) para el modelo
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //seguridad para TODOS los metodos (solo se permite acceso a usurio logueado)
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request) //se validan campos con request (inyectado)
    {

        //objeto creado con atributos de fillable del modelo Category (asignacion en masa)
        //Se guarda el registro correspondiente en la bd
        $category = Category::create($request->all());

        //manejo de imagen

        if ($request->file('image_path')) {
            $path = Storage::disk('public')->put('images_upload', $request->file('image_path'));
            //$category->fill(['image_path'=>asset($path)])->save();
            $category->fill(['image_path'=>$path])->save();
        } else {
            return "NO se envio una imagen";
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show()";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit()";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

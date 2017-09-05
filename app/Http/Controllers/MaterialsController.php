<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{


    /**
     * MaterialsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['destroy','apiMaterialHidden','apiMaterials','apiSearchMaterials']);
    }

    public function index()
    {
        $materials  = Material::published()->get();
        return view('materials.index',compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        Material::create([
            'mid' => $request->get('mid'),
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'price' => $request->get('price'),
            'stock' => $request->get('stock'),
            'sstock' => $request->get('sstock')
        ]);
        return redirect('/materials');
    }

    public function edit($id)
    {
        $material = Material::where('id',$id)->first();
        return view('materials.edit',compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::where('id',$id)->first();
        $material->update([
           'name' => $request->get('name'),
           'type' => $request->get('type'),
           'price' => $request->get('price'),
           'stock' => $request->get('stock'),
           'sstock' => $request->get('sstock'),
            'describe' => $request->get('describe')
        ]);
        return redirect('/materials');
    }

    public function destroy($id)
    {
        $material = Material::where('id',$id)->first();
        $material->delete();
    }

    public function apiMaterialHidden($id)
    {
        $material = Material::where('id',$id)->first();
        if ($material->update(['is_hidden' => 'T'])) {
            return 'ok';
        }
    }

    public function apiMaterials()
    {
        $materials  = Material::published()->get();
        return $materials;
    }

    public function search()
    {
        $material  = Material::published()->where('mid',\request()->query('mid'))->firstOrFail();
        return view('materials.search',compact('material'));
    }

    public function apiSearchMaterials()
    {
        $materials  = Material::published()->where('mid',\request()->query('mid'))->get();
        return $materials;
    }


}

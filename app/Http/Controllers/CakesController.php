<?php

namespace App\Http\Controllers;
use App\Models\Cakes;
use Illuminate\Http\Request;

class CakesController extends Controller
{
    public function welcome()
    {

        return view('cakes.welcome');
    }
    public function index()
    {
        $cakes = Cakes::orderby('id', 'desc')->paginate(5);

        return view('cakes.index', compact('cakes'));
    }

    public function create()
    {

        return view('cakes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:cakes|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);
        $cakes = new Cakes;

        $cakes->nama = $request->nama;
        $cakes->image = $request->image;
        $cakes->size = $request->size;
        $cakes->harga = $request->harga;
        $cakes->data_id = $request->data_id;

        $cakes->save();

        return redirect('/cakes');
    }

    public function show($id)
    {
        $cake = Cakes::where('id', $id)->first();
        return view('cakes.show', ['cake'=>$cake]);
    }

    public function edit($id)
    {
        $cake = Cakes::where('id', $id)->first();
        return view('cakes.edit', ['cake'=>$cake]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:cakes|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);

        Cakes::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id
        ]);

        return redirect('/cakes');
    }

    public function destroy($id)
    {
        Cakes::find($id)->delete();
        return redirect('/cakes');
    }

}

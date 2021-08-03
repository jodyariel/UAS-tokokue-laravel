<?php

namespace App\Http\Controllers\Api;

use App\Models\Cakes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cakes = Cakes::with('data')->WhereHas('data')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Cake',
            'data' => $cakes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:cakes|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required',
        ]);

        $cakes = Cakes::create([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);

        if($cakes)
        {
            return response()->json([
                'success' => true,
                'message' => 'Cake Berhasil Ditambahkan',
                'data' => $cakes
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Cake Gagal Ditambahkan',
                'data' => $cakes
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $cake = Cakes::with('data')->Where('id', $id)->get();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Cake',
            'data' => $cake
        ], 200);
    }

    public function edit($id)
    {
          $cake = Cakes::with('data')->Where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Cake',
            'data' => $cake
        ], 200);
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
        $cakes = Cakes::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $cake
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Cakes::find($id)->delete();
        $cake = Cakes::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cake
        ], 200);
    }
} 
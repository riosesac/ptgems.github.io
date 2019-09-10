<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProdukController extends Controller
{
    public function produk()
    {
        $data = "data semua produk";
        return response()->json($data, 200);
    }

    public function produkAuth()
    {
        $data = "Selamat Datang " . Auth::user()->name;
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $price = $request->input('price');

        $data = new \App\Produk();
        $data->title = $title;
        $data->price = $price;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }

    public function show($id)
    {
        $data = \App\Produk::where('id',$id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        
        $title = $request->input('title');
        $price = $request->input('price');

        $data = \App\Produk::where('id',$id)->first();
        $data->title = $title;
        $data->price = $price;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function destroy($id)
    {
        $data = \App\Produk::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

}

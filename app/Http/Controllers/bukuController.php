<?php

namespace App\Http\Controllers;

use App\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function databuku()
    {
        $data = buku::all();
        return view('databuku', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apage(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahbuku(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'isbn' => 'required',
            'jumlah' => 'required',
        ]);

        $data = new buku();
        $data->judul = $request->judul;
        $data->pengarang = $request->pengarang;
        $data->penerbit = $request->penerbit;
        $data->tahun = $request->tahun;
        $data->ISBN = $request->isbn;
        $data->jumlah = $request->jumlah;
        $data->save();
        return redirect('databuku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sas($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbuku($id)
    {
        $data = buku::where("id","=","$id")->first();
        
        return view('editbuku')->with('data', $data);
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
        $data = buku::find($id);

        $data->judul = $request->judul;
        $data->pengarang = $request->pengarang;
        $data->penerbit = $request->penerbit;
        $data->tahun = $request->tahun;
        $data->ISBN = $request->isbn;
        $data->jumlah = $request->jumlah;

        $data->save();

        return redirect('databuku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $buku = buku::find($id);
        $buku->delete();

        return redirect('databuku');
    }
}

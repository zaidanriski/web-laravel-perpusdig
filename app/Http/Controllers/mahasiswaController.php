<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datamahasiswa()
    {
        $data = mahasiswa::all();
        return view('datamahasiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahmahasiswa(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'nim' => 'required|min:5',
            'prodi' => 'required|min:5',
        ]);

        $data = new mahasiswa();
        $data->nama = $request->nama;
        $data->NIM = $request->nim;
        $data->prodi = $request->prodi;
        $data->save();

        return redirect('datamahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where("id","=","$id")->first();

        return view('editmahasiswa')->with('data', $data);
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
        $data = mahasiswa::find($id);

        $data->nama = $request->nama;
        $data->NIM = $request->nim;
        $data->prodi = $request->prodi;
        $data->save();

        return redirect('datamahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = mahasiswa::find($id);
        $data->delete();

        return redirect('datamahasiswa');
    }
}

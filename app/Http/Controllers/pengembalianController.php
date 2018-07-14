<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\pengembalian;
use App\peminjam;
use App\buku;
use App\mahasiswa;
use App\petugas;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class pengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $kembali = DB::table('pengembalis')
            ->join('mahasiswas', 'pengembalis.nama', '=', 'mahasiswas.id')
            ->join('bukus', 'pengembalis.judul', '=', 'bukus.id')
            ->join('petugas', 'pengembalis.petugas', '=', 'petugas.id')
            ->select('pengembalis.*', 'mahasiswas.nama as nama_maha', 'bukus.judul', 'petugas.nama')
            ->get();

        return view('datapengembalian', compact('kembali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert($id)
    {
        $data = peminjam::find($id);
        $balik = new pengembalian();
        $today = Carbon::today();
        $kembali = DB::table('pengembalis')
            ->join('mahasiswas', 'pengembalis.nama', '=', 'mahasiswas.id')
            ->join('bukus', 'pengembalis.judul', '=', 'bukus.id')
            ->join('petugas', 'pengembalis.petugas', '=', 'petugas.id')
            ->select('pengembalis.*', 'mahasiswas.nama as nama_maha', 'bukus.judul', 'petugas.nama')
            ->get();

        $balik->nama = $data->nama;
        $balik->NIM = $data->NIM;
        $balik->judul = $data->judul;
        $balik->ISBN = $data->ISBN;
        $balik->tanggal_kembali = $today;
        $balik->petugas = $data->petugas;
        $balik->save();
        $data->delete();

        return view('datapengembalian', compact('kembali'));
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
        //
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
        $data = pengembalian::find($id);

        $data->delete();

        return redirect('datapengembalian');
    }
}

<?php

namespace App\Http\Controllers;

use App\peminjam;
use App\buku;
use App\mahasiswa;
use App\petugas;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class peminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('peminjams')
            ->join('mahasiswas', 'peminjams.nama', '=', 'mahasiswas.id')
            ->join('bukus', 'peminjams.judul', '=', 'bukus.id')
            ->join('petugas', 'peminjams.petugas', '=', 'petugas.id')
            ->select('peminjams.*', 'mahasiswas.nama as nama_maha', 'bukus.judul', 'petugas.nama')
            ->get();
        $bukus = buku::pluck('judul', 'id');
        $mahasiswas = mahasiswa::pluck('nama', 'id');
        $petugas = petugas::pluck('nama', 'id');

        return view('datapeminjam', compact('data', 'bukus', 'mahasiswas', 'petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'judul' => 'required',
            'tanggal_pinjam' => 'required',
            'petugas' => 'required',
        ]);

        $data = new peminjam();
        $data->nama = $request->nama;
        $id_mahasiswa = mahasiswa::find($data->nama);
        $data->NIM = $id_mahasiswa->NIM;
        $data->judul = $request->judul;
        $id_buku = buku::find($data->judul);
        $data->ISBN = $id_buku->ISBN;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->petugas = $request->petugas;
        $data->save();

        return redirect('datapeminjam');
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
    public function edit($id)
    {
        $data = peminjam::find($id);
        $bukus = buku::pluck('judul', 'id');
        $mahasiswas = mahasiswa::pluck('nama', 'id');
        $petugas = petugas::pluck('nama', 'id');
        

        return view('editpeminjam', compact('data','bukus', 'mahasiswas', 'petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $data = DB::table('peminjams')
            ->where('peminjams.id', '=', $id)
            ->join('mahasiswas', 'peminjams.nama', '=', 'mahasiswas.id')
            ->join('bukus', 'peminjams.judul', '=', 'bukus.id')
            ->join('petugas', 'peminjams.petugas', '=', 'petugas.id')
            ->select('peminjams.*', 'mahasiswas.nama as nama_maha', 'bukus.judul', 'petugas.nama')
            ->get();

        return view('statuspinjaman', compact('data'));
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
        $data = peminjam::find($id);
        $data->nama = $request->nama;
        $data->NIM = $request->NIM;
        $data->judul = $request->judul;
        $data->ISBN = $request->ISBN;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->petugas = $request->petugas;
        $data->save();

        return redirect('datapeminjam');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = peminjam::find($id);
        $data->delete();

        return redirect('datapeminjam');
    }
}

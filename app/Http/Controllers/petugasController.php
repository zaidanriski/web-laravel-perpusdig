<?php

namespace App\Http\Controllers;

use App\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session::get('login')){
            return redirect('login')->with('alert', 'kamu harus login dahulu');
        }else{
            return view('home');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|min:5',
            'NIP' => 'required|min:5',
            'password' => 'required|min:5',
            're_password' => 'required|same:password'
        ]);

        $data = new petugas();
        $data->nama = $request->fullname;
        $data->NIP = $request->NIP;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success', 'Kamu berhasil Register');
    }

    public function loginPost(Request $request)
    {
        $NIP = $request->nip;
        $password = $request->password;
        $data = petugas::where('NIP',$NIP)->first();
        if(count($data) > 0 ){
            if(Hash::check($password,$data->password)){
                Session::put('nama',$data->nama);
                Session::put('NIP',$data->NIP);
                Session::put('login',TRUE);
                return redirect('/');
            }else{
                return redirect('login')->with('alert','Password Salah');
            }
        }else{
            return redirect('login')->with('alert','NIP/Password Salah');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function databuku()
    {
        return view('databuku');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = petugas::all();
        return view('datapetugas', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'NIP' => 'required|min:5',
            'password' => 'required|min:5',
            're_password' => 'required|same:password'
        ]);

        $data = new petugas();
        $data->nama = $request->nama;
        $data->NIP = $request->NIP;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('datapetugas');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = petugas::where("id","=","$id")->first();

        return view('editpetugas')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $data = petugas::find($id);

        $data->nama = $request->nama;
        $data->NIP = $request->nip;
        $data->save();

        return redirect('datapetugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = petugas::find($id);
        $data->delete();

        return redirect('datapetugas');
    }
}

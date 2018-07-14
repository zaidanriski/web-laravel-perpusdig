@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Status Pinjaman
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Status Pinjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
             @foreach ($data as $datas)
              <table width="320" style="font-size: 19px";>
                <tr>
                  <td>Nama Mahasiswa</td><td>: <b>{{ $datas->nama_maha}}</b>
                 </td>
                </tr>
                <tr>
                  <td>NIM</td><td>: <b>{{ $datas->NIM}}</b> </td>
                </tr>
                <tr>
                  <td>Judul Buku</td><td>: <b>{{ $datas->judul}}</b></td>
                </tr>
                <tr>
                  <td>ISBN</td><td>: <b>{{ $datas->ISBN}}</b></td>
                </tr>
                <tr>
                  <td>Tanggal Pinjam</td><td>: <b>{{ date('d-m-Y', strtotime($datas->tanggal_pinjam)) }}</b></td>
                </tr>
                <tr>
                  <td>Petugas</td><td>: <b>{{ $datas->nama}}</b></td>
                </tr>
              </table>
              </div>
                        <!-- /.box-body -->
            <div class="box-footer">
              <a href="/{{ $datas->id }}/balikbuku"><button type="button" class="btn btn-success">
              Kembalikan Buku
              </button></a>
            </div>   
             @endforeach                   
        </div>
      </div>
    </section>
@endsection
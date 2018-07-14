@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Data Pengembalian
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengembalian</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="20%">Nama</th>
                  <th width="10%">NIM</th>
                  <th width="15%">Judul</th>
                  <th width="10%">ISBN</th>
                  <th width="10%">Tanggal Kembali</th>
                  <th width="15%">Petugas</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($kembali as $datas)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ $datas->nama_maha }}</td>
                  <td>{{ $datas->NIM }}</td>
                  <td>{{ $datas->judul }}</td>
                  <td>{{ $datas->ISBN }}</td>
                  <td>{{ date('d-m-Y', strtotime($datas->tanggal_kembali)) }}</td>
                  <td>{{ $datas->nama }}</td>
                  <td>
                  <form method="POST" action="/{{ $datas->id }}/deletepengembali">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                  <input type="hidden" name="_method" value="DELETE">
                  </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </section>
@endsection
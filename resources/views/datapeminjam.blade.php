@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Data Peminjam
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Peminjam</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-buku">
                <i class="fa fa-plus"></i> Peminjam
              </button>
            </div>

            <div class="modal fade" id="modal-buku">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Peminjam</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('/tambahpeminjam') }}" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      {!! Form::label('nama', null, ['class' => 'control-label']) !!}
                      {!! Form::select('nama', $mahasiswas, null, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'nama']) !!}
                    </div>
                    <div class="form-group has-feedback">
                      {!! Form::label('judul', null, ['class' => 'control-label']) !!}
                      {!! Form::select('judul', $bukus, null, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'judul']) !!}
                    </div>
                    <div class="form-group has-feedback">
                      <label for="datepicker">Tanggal Pinjam :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pinjam" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      {!! Form::label('petugas', null, ['class' => 'control-label']) !!}
                      {!! Form::select('petugas', $petugas, null, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'petugas']) !!}
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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
                  <th width="10%">Tanggal Pinjam</th>
                  <th width="10%">Petugas</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($data as $datas)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ $datas->nama_maha }}</td>
                  <td>{{ $datas->NIM }}</td>
                  <td>{{ $datas->judul }}</td>
                  <td>{{ $datas->ISBN }}</td>
                  <td>{{ date('d-m-Y', strtotime($datas->tanggal_pinjam)) }}</td>
                  <td>{{ $datas->nama }}</td>
                  <td>
                  <form method="POST" action="/{{ $datas->id }}/deletepeminjam">
                  <a href="/{{ $datas->id }}/editpeminjam"><button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit</button></a>
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                  <a href="/{{ $datas->id }}/statuspeminjam"><button type="button" class="btn btn-success btn-xs"> <i class="fa fa-file"></i> Status</button></a>
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
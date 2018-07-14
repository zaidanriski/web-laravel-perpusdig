@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-buku">
                <i class="fa fa-plus"></i> Mahasiswa
              </button>
            </div>


            <div class="modal fade" id="modal-buku">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Mahasiswa</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('/tambahmahasiswa') }}" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Nama" name="nama">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="NIM" name="nim">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="prodi">Prodi :</label>
                      <select class="form-control" id="prodi" name="prodi">
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informatika">Sistem Informatika</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                      </select>
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
                  <th width="25%">Nama</th>
                  <th width="20%">NIM</th>
                  <th width="35%">Prodi</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($data as $datas)
                <tr>
                  <td align="center">{{ $no++ }}</td>
                  <td>{{ $datas->nama }}</td>
                  <td>{{ $datas->NIM }}</td>
                  <td>{{ $datas->prodi }}</td>
                  <td>
                  <form method="POST" action="/{{ $datas->id }}/deletemahasiswa">
                  <a href="/{{ $datas->id }}/editmahasiswa"><button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit</button></a>
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
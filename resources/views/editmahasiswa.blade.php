@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Edit Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Mahasiswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <form action="/{{ $data->id }}/updatemahasiswa" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      <label for="nama">Nama :</label>
                      <input type="text" class="form-control" placeholder="nama" name="nama" id="nama"  value="{{ $data->nama }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="nim">NIM :</label>
                      <input type="text" class="form-control" placeholder="nim" name="nim" id="nim" value="{{ $data->NIM }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="prodi">Prodi :</label>
                      <select class="form-control" id="prodi" name="prodi">
                        <option value="{{ $data->prodi }}">{{ $data->prodi }}</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informatika">Sistem Informatika</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                      </select>
                    </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" name="_method" value="put">
            </form>
              </div>
                        <!-- /.box-body -->
        </div>
      </div>
    </section>
@endsection
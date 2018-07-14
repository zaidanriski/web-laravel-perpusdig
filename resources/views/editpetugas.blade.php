@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Edit Petugas
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Petugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <form action="/{{ $data->id }}/updatepetugas" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      <label for="nama">Nama :</label>
                      <input type="text" class="form-control" placeholder="nama" name="nama" id="nama"  value="{{ $data->nama }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="nip">NIP :</label>
                      <input type="text" class="form-control" placeholder="NIP" name="nip" id="nip" value="{{ $data->NIP }}">
                      <span class="form-control-feedback"></span>
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
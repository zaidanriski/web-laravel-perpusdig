@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Edit Buku
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <form action="/{{ $data->id }}/updatebuku" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      <label for="judul">Judul :</label>
                      <input type="text" class="form-control" placeholder="Judul" name="judul" id="judul"  value="{{ $data->judul }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="pengarang">Pengarang :</label>
                      <input type="text" class="form-control" placeholder="Pengarang" name="pengarang" id="pengarang" value="{{ $data->pengarang }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="penerbit">Penerbit :</label>
                      <input type="text" class="form-control" placeholder="Penerbit" name="penerbit"  id="penerbit" value="{{ $data->penerbit }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="tahun">Tahun :</label>
                      <input type="text" class="form-control" placeholder="Tahun" name="tahun" id="tahun" value="{{ $data->tahun }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="isbn">ISBN :</label>
                      <input type="text" class="form-control" placeholder="ISBN" name="isbn" id="isbn" value="{{ $data->ISBN }}">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="jumlah">Jumlah :</label>
                      <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah" value="{{ $data->jumlah }}">
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
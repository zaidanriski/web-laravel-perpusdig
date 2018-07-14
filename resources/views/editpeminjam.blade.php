@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Edit Peminjam
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Peminjam</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <form action="/{{ $data->id }}/updatepeminjam" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      {!! Form::label('nama', null, ['class' => 'control-label']) !!}
                      {!! Form::select('nama', $mahasiswas, $data->nama, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'nama']) !!}
                    </div>
                    <input type="hidden" name="NIM" value="{{ $data->NIM }}">
                    <div class="form-group has-feedback">
                      {!! Form::label('judul', null, ['class' => 'control-label']) !!}
                      {!! Form::select('judul', $bukus, $data->judul, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'judul']) !!}
                    </div>
                    <input type="hidden" name="ISBN" value="{{ $data->ISBN }}">
                    <div class="form-group has-feedback">
                      <label for="datepicker">Tanggal Pinjam :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pinjam" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="{{ $data->tanggal_pinjam }}">
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      {!! Form::label('petugas', null, ['class' => 'control-label']) !!}
                      {!! Form::select('petugas', $petugas, $data->petugas, ['class' => 'form-control', 'placeholder' => '----', 'id' => 'petugas']) !!}
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
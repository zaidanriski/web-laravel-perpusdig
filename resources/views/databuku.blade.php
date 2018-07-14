@extends('template.templates')

@section('title')
Home
@endsection

@section('content')
 <section class="content-header">
      <h1>
        Data Buku
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-buku">
                <i class="fa fa-plus"></i> Buku
              </button>
            </div>


            <div class="modal fade" id="modal-buku">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Buku</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('/tambahbuku') }}" method="post" role="form">
                  {{ csrf_field() }}
                <div class="register-box-body">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Judul" name="judul">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Pengarang" name="pengarang">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Penerbit" name="penerbit">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Tahun" name="tahun">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="ISBN" name="isbn">
                      <span class="form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
                      <span class="form-control-feedback"></span>
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
                  <th width="25%">Judul</th>
                  <th width="15%">Pengarang</th>
                  <th width="15%">Penerbit</th>
                  <th width="10%">Tahun</th>
                  <th width="10%">ISBN</th>
                  <th width="5%">Jumlah</th>
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
                  <td>{{ $datas->judul }}</td>
                  <td>{{ $datas->pengarang }}</td>
                  <td>{{ $datas->penerbit }}</td>
                  <td>{{ $datas->tahun }}</td>
                  <td>{{ $datas->ISBN }}</td>
                  <td>{{ $datas->jumlah }}</td>
                  <td>
                  <form method="POST" action="/{{ $datas->id }}/deletebuku">
                  <a href="/{{ $datas->id }}/editbuku"><button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit</button></a>
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
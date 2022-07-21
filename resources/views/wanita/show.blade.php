@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Detail Mempelai Wanita</h6>
</div>
<div class="card-body">
  <table>
    <tr>
      <td>Nama Tempat</td>
      <td>:</td>
      <td>{{ $Wanita->nama }}</td>
    </tr>
    <tr>
      <td>Link Facebook</td>
      <td>:</td>
      <td><a href="{{ $Wanita->facebook }}">{{ $Wanita->facebook }}</a></td>
    </tr>
    </tr>
    <tr>
      <td>Link Instagram</td>
      <td>:</td>
      <td>{{ $Wanita->instagram }}</td>
    </tr>
    </tr>
    <tr>
      <td>Link Twitter</td>
      <td>:</td>
      <td>{{ $Wanita->twitter }}</td>
    </tr>
    <tr>
      <td>Pesan</td>
      <td>:</td>
      <td>{{ $Wanita->pesan }}</td>
    </tr>
  </table>
  <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Foto</th>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="{{$Wanita->gambar}}" alt="" width="30%" class="img-thumbnail">
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
@endsection
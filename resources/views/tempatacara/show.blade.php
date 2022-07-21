@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Detail Tempat Acara</h6>
</div>
<div class="card-body">
  <table>
    <tr>
      <td>Nama Tempat</td>
      <td>:</td>
      <td>{{ $TempatAcara->tempat }}</td>
    </tr>
    <tr>
      <td>Waktu Acara</td>
      <td>:</td>
      <td>{{ $TempatAcara->waktu }}</td>
    </tr>
    <tr>
      <td>Pesan</td>
      <td>:</td>
      <td>{{ $TempatAcara->pesan }}</td>
    </tr>
  </table>
  <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Foto Galeri</th>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="{{$TempatAcara->gambar}}" alt="" width="30%" class="img-thumbnail">
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
@endsection
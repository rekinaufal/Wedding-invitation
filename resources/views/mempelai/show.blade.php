@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Detail Mempelai</h6>
</div>
<div class="card-body">
  <table>
    <tr>
      <td>Nama Mempelai Pria</td>
      <td>:</td>
      <td>{{ $Mempelai->pria->nama }}</td>
    </tr>
    <tr>
      <td>Nama Mempelai Wanita</td>
      <td>:</td>
      <td>{{ $Mempelai->wanita->nama }}</td>
    </tr>
    <tr>
      <td>Tempat Acara</td>
      <td>:</td>
      <td>{{ $Mempelai->tempatacara->tempat }}</td>
    </tr>
    <tr>
      <td>Tanggal Acara</td>
      <td>:</td>
      <td>{{ $Mempelai->tempatacara->tanggal }}</td>
    </tr>
    <tr>
      <td>Waktu Acara</td>
      <td>:</td>
      <td>{{ $Mempelai->tempatacara->waktu }}</td>
    </tr>
    <tr>
      <td>Pesan</td>
      <td>:</td>
      <td>{{ $Mempelai->tempatacara->pesan }}</td>
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
          @foreach ($Galeri as $item)
              <img src="{{ $item['gambar'] }}" alt="" width="30%" class="img-thumbnail">
              @endforeach
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
@endsection
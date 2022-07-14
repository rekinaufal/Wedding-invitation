@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('tempatacara.update', $TempatAcara->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label">Tempat</label>
              <input type="text" class="form-control" name="tempat" value="{{$TempatAcara->tempat}}">
            </div>
            <div class="form-outline">
              <label">Pesan</label>
              <textarea class="form-control" rows="8" name="pesan" value="{{$TempatAcara->pesan}}"></textarea>
            </div>
            <div class="form-group">
              <label">Waktu</label>
              <!-- <input type="text" class="form-control" name="waktu"> -->
              <input type="text" name="waktu" class="form-control" value="{{$TempatAcara->waktu}}" required>
              <small>Contoh : 09.00 s/d selesai</small>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{$TempatAcara->tanggal}}">
            </div>
            <div class="form-group">
              <label">Gambar Sebelum</label><br>
              <img src="{{$TempatAcara->gambar}}" width="50%" class="img-thumbnail" alt="gambar pria">
              <input type="hidden" class="form-control" name="gambarold" value="{{$TempatAcara->gambar}}">
              <input type="file" class="form-control" name="gambar" value="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection
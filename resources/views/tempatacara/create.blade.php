@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('tempatacara.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label">Tempat</label>
              <input type="text" class="form-control" name="tempat">
            </div>
            <div class="form-outline">
              <label">Pesan</label>
              <textarea class="form-control" rows="8" name="pesan"></textarea>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label">Tanggal</label>
              <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
              <label">Waktu</label>
              <!-- <input type="text" class="form-control" name="waktu"> -->
              <input type="text" name="waktu" class="form-control" required>
              <small>Contoh : 09.00 s/d selesai</small>
            </div>
            <div class="form-group">
              <label">Gambar</label>
              <input type="file" class="form-control" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection
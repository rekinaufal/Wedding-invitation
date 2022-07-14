@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('wanita.store') }}"  role="form" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label">Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="form-group">
            <label">Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>
          <div class="form-outline">
            <label">Pesan</label>
            <textarea class="form-control" rows="8" name="pesan"></textarea>
          </div>
          <div class="form-group">
            <label">Link Facebook</label>
            <input type="text" class="form-control" name="facebook">
          </div>
          <div class="form-group">
            <label">Link Instagram</label>
            <input type="text" class="form-control" name="instagram">
          </div>
          <div class="form-group">
            <label">Link Twitter</label>
            <input type="text" class="form-control" name="twitter">
          </div>
          <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  @endsection
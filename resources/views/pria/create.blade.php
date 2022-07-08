@extends('admin.index')
  @section('content')
  <form method="POST" action="{{ route('pria.store') }}"  role="form" enctype="multipart/form-data">
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
      <!-- <div class="form-group">
        <label for="sel1">Select list mempelai pria:</label>
        <select class="form-control" name="pria_id">
          <option value="">-- Select one --</option>
          @if(!empty($Pria))
            @foreach ($Pria as $item)
            @endforeach
          @endif
        </select>
      </div> -->
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endsection
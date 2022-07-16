@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('kategori.update', $Kategori->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
          <div class="form-group">
            <label">Nama Kategori</label>
            <input type="text" class="form-control" name="nama" value="{{$Kategori->nama}}">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
  @endsection
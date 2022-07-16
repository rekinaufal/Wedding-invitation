@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('pria.update', $Pria->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
          <div class="row">
            <!-- col 1  -->
            <div class="col"> 
              <div class="form-group">
                <label">Nama Mempelai Pria</label>
                <input type="text" class="form-control" name="nama" value="{{$Pria->nama}}">
              </div>
              <div class="form-group">
                <label">Gambar Sebelum</label><br>
                <img src="{{$Pria->gambar}}" width="80%" class="img-thumbnail" alt="gambar pria">
                <input type="hidden" class="form-control" name="gambarold" value="{{$Pria->gambar}}">
                <input type="file" class="form-control" name="gambar" value="">
              </div>
              <div class="form-group">
                <label">Pesan</label>
                <textarea class="form-control" name="pesan" cols="30" rows="10">{{$Pria->pesan}}</textarea>
              </div>
            </div>
            <!-- col 2 -->
            <div class="col">
              <div class="form-group">
                <label">Facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{$Pria->facebook}}">
              </div>
              <div class="form-group">
                <label">Instagram</label>
                <input type="text" class="form-control" name="instagram" value="{{$Pria->instagram}}">
              </div>
              <div class="form-group">
                <label">Twitter</label>
                <input type="text" class="form-control" name="twitter" value="{{$Pria->twitter}}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
  @endsection
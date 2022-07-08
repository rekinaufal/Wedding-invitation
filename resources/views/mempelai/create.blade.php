@extends('admin.index')
  @section('content')
  <form method="POST" action="{{ route('user.store') }}"  role="form" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label">Name</label>
        <input type="text" class="form-control" name="nama">
      </div>
      <div class="form-group">
        <label for="sel1">Select list mempelai pria:</label>
        <select class="form-control" name="pria_id">
          <option value="">-- Select one --</option>
          @if(!empty($Pria))
            @foreach ($Pria as $item)
            @endforeach
          @endif
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endsection
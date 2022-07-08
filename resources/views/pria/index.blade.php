@extends('admin.index')
@section('content')
<div>
  <a href="{{ route('pria.create') }}" class="btn btn-lg btn-primary">
    <i class="fa fa-plus" style="color:white"></i>
  </a>
</div>
<br>
<table id="example" class="table">
  <thead>
    <tr>
      <th>Nama Mempelai Pria</th>
      <th width="5%">Gambar</th>
      <th>Pesan</th>
      <th>Facebook</th>
      <th>Instagram</th>
      <th>Twitter</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Pria as $item)
      <tr>
        <td>{{ $item->nama }}</td>
        <td><img src="{{ $item->gambar }}" width="50%"></td>
        <td>{{ $item->pesan }}</td>
        <td>{{ $item->facebook }}</td>
        <td>{{ $item->instagram }}</td>
        <td>{{ $item->twitter }}</td>
        <td> 
          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $item->id) }}" method="POST">
            <a href="{{ route('user.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
              <i class="fa fa-edit" style="color:white"></i>
            </a>
            @csrf
            @method('DELETE')   
            <button type="submit" class="btn btn-sm btn-danger">
              <i class="fa fa-trash" style="color:white"></i>
            </button>
          </form> 
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>Nama Mempelai Pria</th>
      <th width="50%">Gambar</th>
      <th>Pesan</th>
      <th>Facebook</th>
      <th>Instagram</th>
      <th>Twitter</th>
      <th>Action</th>
    </tr>
  </tfoot>
</table>
@endsection
@extends('admin.index')
@section('content')
<div>
  <a href="{{ route('user.create') }}" class="btn btn-lg btn-primary">
    <i class="fa fa-plus" style="color:white"></i>
  </a>
</div>
<br>
<table id="example" class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Users as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->status }}</td>
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
      <th>Name</th>
      <th>Email</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </tfoot>
</table>
@endsection
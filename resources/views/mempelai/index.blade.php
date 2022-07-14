@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Mempelai</h6>
    <a href="{{ route('mempelai.create') }}" class="btn btn-sm btn-primary">
      <i class="fa fa-plus" style="color:white"></i>
    </a>
</div>
<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Mempelai Pria</th>
              <th>Mempelai Wanita</th>
              <th>Status</th>
              <th>Action</th>
        </thead>
        <tfoot>
            <tr>
              <th>Mempelai Pria</th>
              <th>Mempelai Wanita</th>
              <th>Status</th>
              <th>Action</th>
        </tfoot>
        <tbody>
          @foreach ($Mempelai as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->status }}</td>
              <td align="center"> 
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mempelai.destroy', $item->id) }}" method="POST">
                  <a href="{{ route('mempelai.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
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
      </table>
  </div>
</div>
@endsection
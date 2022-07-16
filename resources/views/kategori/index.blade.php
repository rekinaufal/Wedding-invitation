@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">
      <i class="fa fa-plus" style="color:white"></i>
    </a>
</div>
<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Nama Kategori</th>
              <th>Created By</th>
              <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Nama Kategori</th>
              <th>Created By</th>
              <th width="10%">Action</th>
            </tr>
        </tfoot>
        <tbody>
          @foreach ($Kategori as $item)
            <tr>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->user->name ?? 'unknows' }}</td>
              <td align="center"> 
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                  <a href="{{ route('kategori.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
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
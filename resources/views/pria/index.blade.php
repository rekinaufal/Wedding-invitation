@extends('admin.index')
@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pria</h6>
    <a href="{{ route('pria.create') }}" class="btn btn-sm btn-primary">
      <i class="fa fa-plus" style="color:white"></i>
    </a>
</div>
<div class="card-body">
  <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Nama Mempelai Pria</th>
              <th width="40%">Gambar</th>
              <th>Pesan</th>
              <th>Facebook</th>
              <th>Instagram</th>
              <th>Twitter</th>
              <th>Created By</th>
              <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th width="21%">Nama Mempelai Pria</th>
              <th>Gambar</th>
              <th>Pesan</th>
              <th>Facebook</th>
              <th>Instagram</th>
              <th>Twitter</th>
              <th>Created By</th>
              <th width="10%">Action</th>
            </tr>
        </tfoot>
        <tbody>
          @foreach ($Pria as $item)
            <tr>
              <td>{{ $item->nama }}</td>
              <td><img src="{{ $item->gambar }}" width="100%"></td>
              <td>{{ $item->pesan }}</td>
              <td>{{ $item->facebook }}</td>
              <td>{{ $item->instagram }}</td>
              <td>{{ $item->twitter }}</td>
              <td>{{ $item->user->name ?? 'unknows' }}</td>
              <td align="center"> 
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pria.destroy', $item->id) }}" method="POST">
                  <a href="{{ route('pria.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">
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
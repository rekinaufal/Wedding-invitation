@extends('admin.index')
  @section('content')
  <form method="POST" action="{{ route('user.store') }}"  role="form" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="sel1">Pilih mempelai pria:</label>
        <button type="button" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-male" aria-hidden="true"></i>
        </button>
      </div>
      <div class="form-group">
        <label">Nama Mempelai Pria</label>
        <input type="text" class="form-control" name="pria_id" id="namapria" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Mempelai Pria</h4>
      </div>
      <div class="modal-body">
        <table id="example" class="table">
          <thead>
            <tr>
              <th>Nama Mempelai Pria</th>
              <th width="5%">Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Pria as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td><img src="{{ $item->gambar }}" width="50%"></td>
                <td> 
                    <button class="btn btn-sm btn-primary pilih-pria" value="{{ $item->id }}" data-dismiss="modal">
                      <i class="fa fa-check" style="color:white" value="{{ $item->id }}"></i>
                    </button>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Nama Mempelai Pria</th>
              <th width="50%">Gambar</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  @endsection